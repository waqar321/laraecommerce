<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\category;
use App\Models\Product_Image;
use App\Models\productColor;
use App\Models\Brand;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller{

   public function index(){
  
      $products = product::all();
   		return view('admin.products.index', compact('products'));
   }

   public function create(){
   		$categories = Category::all();
   		$brands = Brand::all();
      $colors= color::where('status','0')->get();

   		return view('admin.products.create', compact('categories','brands','colors'));
   }

   public function store(ProductFormRequest $Request){

     	$validatedData = $Request->validated();
  		$category = Category::findOrFail($validatedData['category_id']);    //retrieve category row according to category_id

      /*
        $category variable ne Category model se data uthaya with the help of "Category::findOrFail"
        $category means Category model object that was taken with the help of "category_id",
        Now products() is function defined in Category model, this function defines 1 category can have many
        products, now this code "$category->products()->create('fields')" means category model me jao, 
        product function ke through product ka table uthao or ye sari fields ka data jo ke request se aya utha ke 
        porduct me insert kardo.

      */
              
      $name = brand::where('id', $validatedData['brand'])->pluck('name');         

   		$product = $category->products()->create([           //insert in both table fields, both has relationship 
   			'category_id' => $validatedData['category_id'],
   			'name' => $validatedData['name'],
   			'slug' => str::slug($validatedData['slug']),
   			'brand' => $name[0],
   			'small_description' => $validatedData['small_description'],
   			'description' => $validatedData['description'],
   			'original_price' => $validatedData['original_price'],
   			'selling_price' => $validatedData['selling_price'],
   			'quantity' => $validatedData['quantity'],
   			'trending' => $Request->trending == true ? '1':'0',
   			'status' => $Request->trending == true ? '1':'0',
   			'meta_title' => $validatedData['meta_title'],
   			'meta_description' => $validatedData['meta_description'],
   			'meta_keyword' => $validatedData['meta_keyword'],
   		]);


   		if($Request->hasFile('image')){
		
   	 		$uploadPath = 'uploads/products/';
            $i=1; 
   	 		foreach($Request->file('image') as $imageFile){
   	
           $extention = $imageFile->getClientOriginalExtension();  //returns jpg
   				 $filename = time().$i++.'.'.$extention;
   				 $imageFile->move($uploadPath,$filename);       //move the filename to uploadpath
   				 $finalImagePathName = $uploadPath.$filename;
                //$finalImagePathName = $uploadPath.'-'.$filename;
		 		 

           /*
            productImages() 1 function he jo ke product model me define he jisme likha he hasMany which means
            1 prduct can have multiple images, now this code "$product->productImages()->create([" defines
            that jo product create hua he above, usme productimages bhi add kardo.. jitni bar loop chale add karo.
           */
		   		 $product->productImages()->create([ 			//product has many images
		   		 	'product_id' => $product->id,
		   		 	'image' => $finalImagePathName, 
		   		 ]);
                //product image me 'product_id' 1 foreign key he jo ke product ki id ko lia gaya he,
                // uske ref se product_images me jitni bhi images aengi wo is product ki id se link hongi.
   			 }
    
   		}

      if($Request->colors){                               // just color uthaya quantity ni, result dono ka same hi aega
          foreach($Request->colors as $key => $color){    //$key=$coloritem->id   && $color=$coloritem->name
             //dd($Request->colors);                      // shows object of keys and values
             $product->productColors()->create([           //insert in both table fields, both has relationship 
                   'product_id' => $product->id,          //insert in the product that is creating  above code
                   'color_id'  => $color,                 //$color=$coloritem->name from form
                   'quantity_id'  => $Request->colorquantity[$key] ?? 0    //$key = coloritem->id 
                ]);   
               /*
                productColor() 1 function he jo ke product model ke andar he or function ne bus
                itna bataya he ke product has many relationships with productColor model.
                q ke productColor model ke andar 3 keys hen jo uper define hen..
                */
          }
      }
   		return redirect('/admin/product')->With('message','Product added successfully!');
   }

   public function edit(int $product_id=null){
      $categories = Category::all();
      $brands = Brand::all();
      $product = Product::findOrFail($product_id);    //any row data of product table according to $product_id
      //dd(Product::find(10)->productColors);       // product ki id no 10 pe productColors ka data he.. 
     
      /*
      $product = Product::findOrFail(8);
      foreach($product->productColors as $prodColor) { 
                   echo "Product ID => ".$prodColor->product_id."<br>";
                   echo "Color ID => ".$prodColor->color_id." => "; 
                   echo  "Product Color name: ".$prodColor->color->name."<br>";    
                   echo "Quantity ID => ".$prodColor->quantity_id."<br>"."<br>";
      }
      dd("testing");
      */
      /*
      foreach($product->productColors as $ProductNdProductColorMix){    
                   echo $ProductNdProductColorMix->id."<br>";    //e.g: id in productColor table..
                   //echo $ProductNdProductColorMix->color_id."<br>";    //e.g: color_id in productColor table..
                   //echo $ProductNdProductColorMix->product_id."<br>";  //e.g: product_id in productColor table...
                   //echo $ProductNdProductColorMix->quantity_id."<br>"; //e.g: quantity_id in productColor table...
                   //echo $ProductNdProductColorMix->name."<br>";        //NO output, it only show ProductColor table...
                   //echo $ProductNdProductColorMix->slug."<br>";        //NO output, it only show ProductColor table
                  
       }
       dd("asd");
      */

      /*
      subse pehle $product_id me key aegi then product::findorFail($product_id) ke through product ki row uthegi,
      for example id 8 aaai he to product ki id 8 ka data uth ke ajaega, then product model ke andar productColors()
      table he jiske through relation hua wa he, this code "Product::find(10)->productColors" is gonna find 
      product ki id 10 or is id ki base pe productColors table ke andar jitna bhi data he wo le aye jese
      product ki id =10 or productColor table ke andar wo id as a product_id =10 , so dono table ka data utha ke le ao..
      */

      $product_color= $product->productColors->pluck('color_id')->toArray();   //10:1;  && 10=>5;
              /*
                echo "<pre>";
                print_r($product_color);    if productID is 10, output color_id as key,value
                echo "</pre>";
                dd("asd");
              */
      $colors = color::whereNotIn('id',$product_color)->get();                //1 or 5 ke ilawa baqi color uthao      
  
      /*  
      foreach($colors as $color){
                    echo $color->id."=>".$color->name."=>".$color->code."<br>";   //jo color product me nahi hen
      } dd("testing");
      Eloquent pluck() method helps us to extract certain values into 1 dimension array. It shortens our code if we want only to get the specific field values into 1 dimension array so that we don't need to loop the result collection to get certain values using this method
      */

      return view('admin.products.edit',compact('product','categories','brands','colors'));
   }

   public function update(ProductFormRequest $Request, int $product_id){
       
        $validatedData = $Request->validated();
        $product = Category::findOrFail($validatedData['category_id'])->products()->where('id',$product_id)->first();
        //$product = Category::findOrFail(4)->products()->where('id',24);
        
        /*
           category modal me ja category ka data uthao  id = $validatedData['category_id'] == 4,  then category modal me product 
           ka function he usme jao or child or foreign key relationship wala sara data uthao lekin show sirf wo karo jisme
           product_id match kare
            dd($product); // wo product return karega jisme category_id match karegi category ki primary id se..  
         */
        
         if($product){
               $product->update([
                  'category_id' => $validatedData['category_id'],
                  'name' => $validatedData['name'],
                  'slug' => str::slug($validatedData['slug']),
                  'brand' => $validatedData['brand'],
                  'small_description' => $validatedData['small_description'],
                  'description' => $validatedData['description'],
                  'original_price' => $validatedData['original_price'],
                  'selling_price' => $validatedData['selling_price'],
                  'quantity' => $validatedData['quantity'],
                  'trending' => $Request->trending == true ? '1':'0',
                  'status' => $Request->trending == true ? '1':'0',
                  'meta_title' => $validatedData['meta_title'],
                  'meta_description' => $validatedData['meta_description'],
                  'meta_keyword' => $validatedData['meta_keyword'],
               ]);

               if($Request->hasFile('image')){
      
                  $uploadPath = 'uploads/products/';
                  $i=1; 
                  foreach($Request->file('image') as $imageFile){
            
                      $extention = $imageFile->getClientOriginalExtension();  //returns jpg
                      $filename = time().$i++.'.'.$extention;
                      $imageFile->move($uploadPath,$filename);       //move the filename to uploadpath
                      $finalImagePathName = $uploadPath.$filename;
                      //$finalImagePathName = $uploadPath.'-'.$filename;
                  
                      $product->productImages()->create([         //product has many images relationship, 
                        'product_id' => $product->id,
                        'image' => $finalImagePathName, 
                      ]);
                      //product image me 'product_id' 1 foreign key he jo ke product ki id ko lia gaya he,
                         // uske ref se product_images me jitni bhi images aengi wo is product ki id se link hongi.
                  } 
               }


                if($Request->colors){                               // just color uthaya quantity ni, result dono ka same hi aega
                      foreach($Request->colors as $key => $color){    //$key=$coloritem->id   && $color=$coloritem->name
                         //dd($Request->colors);                      // shows object of keys and values
                         $product->productColors()->create([           //insert in both table fields, both has relationship 
                               'product_id' => $product->id,          //insert in the product that is creating  above code
                               'color_id'  => $color,                 //$color=$coloritem->name from form
                               'quantity_id'  => $Request->colorquantity[$key] ?? 0    //$key = coloritem->id 
                            ]);   
                           
                      }
                  }

               return redirect('/admin/product')->With('message','Product Update successfully!');
         }
         else{
            return redirect('admin/product')->With('message','No such Product Id found!');
         }
   }

   public function updateProdColorQty(Request $request, $prod_color_id) {
        
      
       $productColorData = Product::findOrFail($request->product_id)->productColors()->where('id',$prod_color_id)
                           ->first();
          
        $productColorData->update([
              'quantity_id' => $request->qty
        ]);
        /*    
          $productColorData = Product::findOrFail(10)->productColors()->where('id',9)->first();
          $productColorData->update(['quantity_id' => 10]);

          //echo $productColorData->color_id."<br>".$productColorData->quantity_id;
          dd("quantity of Red color from product 10 is now 20");
         */        
  
         return response()->json(['message'=>'Product Color qty updated']);
   }

   public function DeleteProdColorQty(Request $request, $prod_color_id){
             
      $prodColor = productColor::findOrFail($prod_color_id);   //delete Color_id and quantity both
      $prodColor->delete();

      return response()->json(['message'=>'Product Color qty Deleted']);
   }  

   public function destroyImage(int $product_image_id){
          $productImage = Product_Image::FindOrFail($product_image_id);
         
          if(file::exists($productImage->image)){ 
             File::delete($productImage->image);
          }
          $productImage->delete();
         return redirect('admin/product')->With('message','Product Image delete!!');
         
   }  
   public function delete(int $product_image_id){
         $product = Product::findOrFail($product_image_id);

         if($product->productImages){           //productImages is a function in product modal
               foreach($product->productImages as $image){
                    if(File::exists($image->image)){
                        File::delete($image->image);  //delete file directory from db
                    } 
                   $image->delete();                  // delete file
               }
         }
         $product->delete();           // product::delete('delete from student where id = ?',[$id]);
        return redirect('admin/product')->With('message','Product Has Been Deleted!!!');
   }
}
