   <div wire:ignore.self class="modal fade" id="CreateStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="CloseCreate">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="CreateCategoryData">
 
                      <div class="form-group row">
                              <label for="name" class="col-3">Name</label>
                              <div class="col-9">
                                  <input type="text" id="name" class="form-control" wire:model="Cname">
                                  @error('Cname')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div> 

                      <div class="form-group row">
                              <label for=" slug" class="col-3"> Slug</label>
                              <div class="col-9">
                                  <input type="text" id="Cslug" class="form-control" wire:model="Cslug">
                                  @error('Cslug')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>
                      
                      <div class="form-group row">
                              <label for="description" class="col-3">Description</label>
                              <div class="col-9">
                                  <input type="text" id="Cdescription" class="form-control" wire:model="Cdescription">
                                  @error('Cdescription')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>   
                      </div>
                       
                     
                      <div class="form-group row">
                          <label for="description" class="col-3">Image</label>
                              <div class="col-9">
                                  <input type="file" name="image" id="Cimage" class="form-control" wire:model="Cimage">
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
                                  <input type="text" id="Cmeta_title" class="form-control" wire:model="Cmeta_title">
                                  @error('Cmeta_title')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div>  
                      
                      <div class="form-group row">
                              <label for="meta_keyword" class="col-3">Meta Keyword</label>
                              <div class="col-9">
                                  <input type="text" id="Cmeta_keyword" class="form-control" wire:model="Cmeta_keyword">
                                  @error('Cmeta_keyword')
                                      <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                  @enderror
                              </div>
                      </div> 
                      
                      <div class="form-group row">
                              <label for="meta_description" class="col-3">Meta Description</label>
                              <div class="col-9">
                                  <input type="text" id="Cmeta_description" class="form-control" wire:model="Cmeta_description">
                                  @error('Cmeta_description')
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