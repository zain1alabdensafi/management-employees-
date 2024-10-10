<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function all_product()
    {
        try{
        $product = Product::query()
            ->select('products.*')->get();
        return view('all_product')->with(['product' => $product]);
        }
        catch(QueryException $e){
            DB::rollBack();
            return redirect()->route('all_product')->withErrors('A database error occurred:' .$e->getMessage());
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all_product')->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    //------------------------------------------------------------------------------

    public function edit_product(Request $request)
    {
        try {
            DB::beginTransaction();
            $productexist = Product::query()->where('product_name','=',$request['product_name'])->first();
            if($productexist)
            {$startTime = now();
                $id = Auth::id();
                $i = Employee::query()->where('id','=',$id)->first();

                Log::info('Attempting to Update Product: ' . $productexist . '  By : ' . $i->first_name .  now());
                $productexist->product_name = $request['new_product_name'];
                $productexist->quantity = $request['new_quantity'];
                $productexist->save();
                Log::info('Successfully Updated a Product: ' . $productexist  . '  By : ' . $i->first_name . now());
                DB::commit();
                return redirect()->route('edit_product')->with('success','Product is Updated');
            }
            DB::rollBack();
            return redirect()->route('edit_product')->withErrors(['error','Product does not exist']);
        }
        catch(QueryException $e){
            DB::rollBack();
            return redirect()->route('edit_product')->withErrors(['A database error occured: ' . $e->getMessage()]);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('edit_product')->withErrors('An error occurred: ' . $e->getMessage());
        }   
    }

    //------------------------------------------------------------------------------------------------


    public function products_most_sells(Request $request)
    {
        try{
        $products = DB::table('orders')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->select('products.product_name', DB::raw("COUNT(*) AS quantity"), DB::raw("
            CASE 
                WHEN COUNT(*) > 5 THEN 'High selling'
                WHEN COUNT(*) < 3 THEN 'Low selling'
                ELSE 'Medium selling'
            END AS selling_category
        "))
        ->whereBetween('orders.order_date', [$request['startDate'], $request['endDate']])
        ->groupBy('products.product_name')
        ->orderBy('quantity', 'DESC')
        ->get();
        
        return view('products_most_sells', ['products' => $products]);

    }catch(QueryException $e)
    {
        return redirect()->route('products_most_sells')->withErrors(['A database error occured: ' . $e->getMessage()]);
    }
    catch(\Exception $e){
        return redirect()->route('products_most_sells')->withErrors(['error' =>$e->getMessage()]);
    }
    }

    //------------------------------------------------------------------------------------------------

        public function add_product(Request $request)
        {
            try{
                DB::beginTransaction();
                $productexist = Product::query()->where('product_name','=',$request['product_name'])->exists();
                if($productexist){
                    return redirect()->route('add_product')->withErrors('Product already exists');
                }
                $data = Validator::make($request->all(),[
                    'product_name' => 'required',
                    'quantity' => 'required|integer',
                ]);

                Log::info('Attempting to Validate data: '. $data . now() );
                if($data->fails()){
                    DB::rollBack();
                    return redirect()->route('add_product')->withErrors($data->errors());
                }
                $id = Auth::id();
                $i = Employee::query()->where('id','=',$id)->first();
                Log::info('Attempting to add product: ' .$request['product_name'] . ' By ' . $i->first_name  . now());
                $product = Product::create([
                    'product_name' => $request['product_name'],
                    'quantity' => $request['quantity']
                ]);
                $product->save();
                Log::info('Successfully added a new product ' . $request['product_name']  . '  By : ' . $i->first_name  . now());
                DB::commit();
                return redirect()->route('add_product')->with(['success' => 'Product Created Successefully','product_id' => $product->id]);
            
            }catch(QueryException $e){
                return redirect()->route('add_product')->withErrors(['An error occurred: ' . $e->getMessage()]);
            }
            catch (\Exception $e){
                DB::rollBack();
                if($e->getMessage() == 'Product Name is exists')
                return redirect()->route('add_product')->withErrors(['An error occurred: ' . $e->getMessage()]);
            }
            catch(\Exception $e){
                DB::rollBack();
                return redirect()->route('add_product')->withErrors(['error' => $e->getMessage()]);
            }
        }

        //------------------------------------------------------------------------------------------------

        public function delete_product(Request $request)
        {
            $product= collect();
            try{
                DB::beginTransaction();
                if($request->has('search')){
                    Log::info('Attempting to Search Product: '. $request['product_name']);
                    $product = Product::query()->where('product_name', 'like', '%' . $request['search']. '%')->get();
                }
                elseif($request->has('ids')){
                    foreach($request['ids'] as $id){
                    Log::info('Attempting to find product: ' . $id);
                    $product = Product::find($id);
                    if($product){
                        Log::info('Found product: ' . $product['product_name']);

                    $id = Auth::id();
                    $i = Employee::query()->where('id','=',$id)->first();
                        foreach($product->order as $orders) {
                            Log::info('Attempting to Delete Orders for this product: ' . $product['product_name'] . ' By : ' . $i->first_name  . now());
                            $orders->delete();
                        }
                        Log::info('Attempting to Delete Products: ' . $product['product_name'] . ' By : ' . $i->first_name  .  now());
                        $product->delete();
                    }
                }
                Log::info('Successefully deleted product' . $request['product_name'] . ' By ' . $i->first_name  . now());
                DB::commit();
                return redirect()->back()->with(['success' => 'Product and its Order deleted successfully']);
            }
            }catch(QueryException $e){
                return redirect()->route('delete_product')->withErrors(['A database error occurred: ' . $e->getMessage()]);
            }
            catch(\Exception $e){
                DB::rollBack();
                if($e->getMessage() == 'Product not found')
                return redirect()->route('delete_product')->withErrors(['An error occurred: ' . $e->getMessage()]);
            }
            catch(\Exception $e){
                DB::rollBack();
                return redirect()->route('add_product')->withErrors(['error' => $e->getMessage()]);
            }
            return view('Admin.delete_product')->with(['product'=>$product]);
        }
}    