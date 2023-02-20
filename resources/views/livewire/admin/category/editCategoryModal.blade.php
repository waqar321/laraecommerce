
 <!-- Edit Modal -->

    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="CloseEdit">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="editCategoryData">
                    
                     

                      <div class="form-group row">
                              <label for="name" class="col-3">Name</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="name">
                                  @error('name')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>

                      <div class="form-group row">
                              <label for=" slug" class="col-3"> Slug</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="slug">
                                  @error(' slug')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>
                      
                      <div class="form-group row">
                              <label for="description" class="col-3">Description</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="description">
                                  @error('description')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>   
                      </div>
                                         
                     
                      <div class="form-group row">
                          <label for="Image" class="col-3">Image</label>
                              <div class="col-9">
                                  <input type="file" name="Cimage" id="Cimage" class="form-control" wire:model="EditImage">
                                  <img src="{{ asset('storage/'.$EditImage) }}" width="60x" height="60px" />
                                  @error('Cimage')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>   
                      </div>
                    
                     

                    <div class="form-group row">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                 <input type="checkbox" name="status" wire:model="status">
                                @error('status')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>  
           

                      <div class="form-group row">
                              <label for="meta_title" class="col-3">Meta Title</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="meta_title">
                                  @error('meta_title')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>  
                      
                      <div class="form-group row">
                              <label for="meta_keyword" class="col-3">Meta Keyword</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="meta_keyword">
                                  @error('meta_keyword')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div> 
                      
                      <div class="form-group row">
                              <label for="meta_description" class="col-3">Meta Description</label>
                              <div class="col-9">
                                  <input type="text" id="meta_description" class="form-control" wire:model="meta_description">
                                  @error('meta_description')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>

                <div cl ass="col-md-12 mb-3"> <!-- button div -->
                    <button type="submit" class="btn btn-primary float-end"> Update </button>
                </div>  


                    </form>
                </div>
            </div>
        </div>
    </div>
