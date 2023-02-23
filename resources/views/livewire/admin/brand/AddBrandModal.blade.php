   <div wire:ignore.self class="modal fade" id="addbrandmodal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="CloseAddBrand">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="storeBrand">

                      <div class="mb-3">
                          <label>Select category</label>
                          <select wire:model.defer="category_id" required class="form-control"> 
                              <option value=""> - Select Category </option>
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}" > {{ $category->name }} </option>
                              @endforeach
                           </select>
                            @error('category_id')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                      </div>

                      <div class="form-group row">
                              <label for="name" class="col-3">Brand Name</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="name">
                                  @error('name')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div> 

                      <div class="form-group row">
                              <label for=" slug" class="col-3"> Brand Slug</label>
                              <div class="col-9">
                                  <input type="text" id="slug" class="form-control" wire:model="slug">
                                  @error('slug')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>
                      
                      <div class="form-group row">
                              <label for="Status" class="col-3">Status</label>
                              <div class="col-9">
                                <input type="checkbox" name="Status" wire:model="status" style="width:100px">
                                <!-- <input type="text" id="status" class="form-control" wire:model="status"> -->
                                  @error('status')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>   
                      </div>                   
  
                      <div cl ass="col-md-12 mb-3"> <!-- button div -->
                          <button type="submit" class="btn btn-primary float-end"> Add Categories </button>
                      </div>  


                    </form>
                </div>
            </div>
        </div>
    </div>