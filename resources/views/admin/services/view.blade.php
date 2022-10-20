@extends("admin.layouts.master")

@section("content")    
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <h4 class="page-title float-left">PRODUCTS</h4>
                 
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th width="30%">Service Name</th>
                         
                          <th width="5%">Edit</th>
                          <th width="5%">Status</th>
                          <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="disable-product" tabindex="-1" role="dialog" aria-labelledby="modal-5">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h4 class="modal-title has-icon text-white">DISABLE PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
               <div class="modal-body">
                  <p>Are you sure to disable this product?</p>
               </div>
               <div class="modal-footer">
                   <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                      <input type="hidden" name="product_id" id="disable_id">
                     <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Disable</button>
                  </form>
               </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="enable-product" tabindex="-1" role="dialog" aria-labelledby="modal-5">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h4 class="modal-title has-icon text-white">ENABLE PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
               <div class="modal-body">
                  <p>Are you sure to enable this product?</p>
               </div>
               <div class="modal-footer">
                   <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                      <input type="hidden" name="product_id" id="enable_id">
                     <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Enable</button>
                  </form>
               </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="delete-product" tabindex="-1" role="dialog" aria-labelledby="modal-5">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h4 class="modal-title has-icon text-white">DELETE PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
               <div class="modal-body">
                  <p>Are you sure to delete this product?</p>
               </div>
               <div class="modal-footer">
                   <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                      <input type="hidden" name="product_id" id="delete_id">
                     <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Delete</button>
                  </form>
               </div>
            </div>
          </div>
        </div>
  
@endsection 