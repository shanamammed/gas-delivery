<!DOCTYPE html>
<html>
  <head>
    @include("admin.partials.header")
  </head>
  <body>
    <div id="wrapper">
      @include("admin.partials.sidebar")
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <h4 class="page-title float-left">EDIT SERVICE</h4>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card-box">
                <form  id="Myform" action="{{ route('serviceUpdate') }}" method="post" enctype="multipart/form-data">
                   {!! csrf_field() !!}
                  <div id="add_data">
                     <div class="form-row">
                        <div class="col-md-6">
                          <label>Service Name English<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_name_english" class="form-control"  placeholder="Name" value="{{ $service->service_name_english }}" required>
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Service Name Arabic<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_name_arabic" class="form-control"  placeholder="Name" value="{{ $service->service_name_arabic }}" required>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </div>
                        </div>
                      </div>
                      <br>
                      <?php $i=1;?>
                      @foreach($service_types as $type)
                      <div class="form-row">
                        <div class="col-md-6">
                          <label>Service Type English<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_types_english<?=$i?>[]" class="form-control"  placeholder="Name" value="{{ $type->service_type_english }}" required>
                            <input type='hidden' name='values[]' value="<?=$i?>" >
                            <input type="hidden" name="size<?=$i?>[]" <?php if($type->has_sub_type=='1') {?>value="yes" <?php } else {?> value="no" <?php };?>>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Service Type Arabic<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_types_arabic<?=$i?>[]" class="form-control"  placeholder="Name" value="{{ $type->service_type_arabic }}" required>
                            <input type="hidden" step="any" min="0" name="single_price<?=$i?>[]" id="single_price" class="form-control" placeholder="Price">
                          </div>
                        </div>
                      </div>
                      <br>
                      @if($type->has_sub_type)
                      <div id="multi-section">
                          <p class="mb-1 mt-4 font-weight-bold">Sub types<span style="color: red;">*</span></p>
                          <div class="">
                            <div class="form-group">
                              <div class="col-12">
                                <table id="product-priceSize<?=$i?>">
                                  <thead>
                                    <tr>
                                      <td width="60%">Sub type</td>
                                      <td width="50%">Price</td>
                                      <td width="40%">Delete</td>
                                    </tr>
                                  </thead>
                                  <?php $k=0;?>
                                  @foreach($type->sub_types as $sub)
                                  <tr>
                                    <td><input type="text" class="form-control quantity" name="unit<?=$i?>[]" value="{{ $sub->sub_type_name }}" id="unit"></td>
                                    <input type="hidden" name="type_values<?=$i?>[]" value="{{ $i }}">
                                    <td><input type="number" class="form-control price" id="multi_price" name="price<?=$i?>[]" value="{{ $sub->price }}" min="0" step="any"></td>
                                    <?php if($k=='0') {?> <td style="text-align:center;"> - </td> <?php } else {?><td style="text-align:center;"> <a class='btn btn-link' onclick='deleteRow(this)'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a> </td><?php };?>
                                  </tr>
                                  <?php $k++;?>
                                  @endforeach
                                </table>
                                <div class="text-center">
                                  <button type="button" class="btn btn-link" onclick="addRowSize1(<?=$i?>)"><i style="font-size:25px;" class="fa fa-plus-circle"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    @else
                     <div class="form-row" id="single-section">
                        <br>
                        <div class="col-md-6">
                          <label>Price<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="number" step="any" min="0" name="single_price<?=$i?>[]" id="single_price" class="form-control" value="{{ $type->price }}" placeholder="Price">
                             <input type="hidden" class="form-control quantity" name="unit<?=$i?>[]" id="unit">
                            <input type="hidden" name="type_values<?=$i?>[]" value="{{ $i }}">
                            <input type="hidden" class="form-control price" id="multi_price" name="price<?=$i?>[]" min="0" step="any">
                          </div>
                        </div>
                        <br>
                    </div><br>
                    @endif  
                    <?php $i++; ?>  
                    @endforeach
                    <br>
                    <div id="add-more">

                    </div>
                   
                    <div  id="add-section">
                      <div class="form-row" >
                         <button type="button" class="btn btn-primary" style="color: blue;" onclick="addRow1(<?=$i?>)">Add more service types</button>
                      </div> 
                    </div>
                  
                  </div>
                  
                  <div id="Products">
                 
                  </div> 

                <div class="form-row">
                  <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-success waves-light waves-effect w-md pull-right" id="submit-button" style="display:block;">Update</button>
                  </div>
                </div> 
           
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
      @include("admin.partials.footer")
  </div>
  </body>
  @include("admin.partials.scripts")
  <script type="text/javascript">
    var imm = 0;
    var image;
    var image_id;
    function addRow1(id)
    {   
      im      = imm+id; 
      // alert(im); 
      imageid = 'image' + im;
      inputid = 'img' + im;
      preview = 'preview' + im;
      tab_id  = "product-priceSize" + im;
      image = "<div id='"+ imageid +"'>\
                 <div class='form-row'>\
                   \
                 </div>\
                    <div class='form-row'>\
                        <div class='col-md-6'>\
                          <label>Service Type English<span style='color: red;'>*</span></label>\
                          <div class='input-group'>\
                            <input type='text' name='service_types_english"+im+"[]' class='form-control'  placeholder='Name' required>\
                          </div>\
                        </div>\
                        <div class='col-md-6'>\
                          <label>Service Type Arabic<span style='color: red;'>*</span></label>\
                          <div class='input-group'>\
                            <input type='hidden' name='values[]' value='"+im+"'>\
                            <input type='text' name='service_types_arabic"+im+"[]' class='form-control'  placeholder='Name' required>\
                          </div>\
                        </div>\
                      </div>\
                      <br>\
                      <div class='form-row'>\
                        <div class='col-md-6'>\
                          <label>Have any sub type?<span style='color: red;'>*</span></label>\
                          <div class='input-group'>\
                           <input type='radio' name='size"+im+"[]' id='s1"+im+"' value='yes' onclick='radio_check(`"+im+"`)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes\
                          </div><br>\
                          <div class='input-group'>\
                             <input type='radio' name='size"+im+"[]' id='s2"+im+"' value='no' onclick='radio_check(`"+im+"`)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No\
                          </div>\
                        </div>\
                      </div>\
                      <div class='form-row' id='single-section"+im+"' style='display:none;'>\
                        <br>\
                        <div class='col-md-6'>\
                          <label>Price<span style='color: red;'>*</span></label>\
                          <div class='input-group'>\
                            <input type='number' step='any' min='0' name='single_price"+im+"[]' id='single_price"+im+"' class='form-control'  placeholder='Price'>\
                          </div>\
                        </div>\
                        <br>\
                      </div>\
                      <div id='multi-section"+im+"' style='display:none;'>\
                          <p class='mb-1 mt-4 font-weight-bold'>Price<span style='color: red;'>*</span></p>\
                          <div class='>\
                            <div class='form-group'>\
                              <div class='col-12'>\
                                <table id='"+tab_id+"'>\
                                  <thead>\
                                    <tr>\
                                      <td width='60%'>Sub type</td>\
                                      <td width='50%'>Price</td>\
                                      <td width='40%'>Delete</td>\
                                    </tr>\
                                  </thead>\
                                  <tr>\
                                    <td><input type='text' class='form-control quantity' name='unit"+im+"[]' id='unit"+im+"'></td>\
                                    <td><input type='number' class='form-control price' id='multi_price"+im+"' name='price"+im+"[]' min'0' step='any'></td>\
                                    <td style='text-align:center;'> - </td>\
                                  </tr>\
                                </table>\
                                <div class='text-center'>\
                                  <button type='button' class='btn btn-link' onclick='addRowSize1(`"+im+"`)'><i style='font-size:25px;' class='fa fa-plus-circle'></i></button>\
                                </div>\
                              </div>\
                            </div>\
                          </div>\</br>\
                  </div>";
      $('#add-more').append(image);
      imm = imm + 1;
    }

    function addRowSize()
    {   
        var col1 = "<tr><td><input type='text' class='form-control' name='unit[]' required></td>";
        var col2 = "<td><input type='number' class='form-control' step='any' min='0' name='price[]' required></td>";
        var col3 = "<td><a class='btn btn-link' onclick='deleteRow(this);'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a></td></tr>";
        var row = col1 + col2 + col3;
        $('#product-priceSize').append(row);
    }
    
    function addRowSize1(id)
    {   
        // alert(id);
        var col1 = "<tr><td><input type='text' class='form-control' name='unit"+id+"[]' required></td>";
        var col2 = "<td><input type='number' class='form-control' step='any' min='0' name='price"+id+"[]' required></td>";
        var col3 = "<td><a class='btn btn-link' onclick='deleteRow(this);'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a></td></tr>";
        var row = col1 + col2 + col3;
        $('#product-priceSize'+id).append(row);
    }

    function deleteRow(row)
    {
      $(row).closest('tr').remove();
    }
    function delete_div(btn)
    {
      imageid = 'image' + btn.id;
      document.getElementById(imageid).remove();
    }
   </script>
 
    <script>
          $(document).on('change','input:radio[name="size[]"]',function(){
          if (document.getElementById('s1').checked) 
          {
            $('#multi-section').css('display','block');
            $('#single-section').css('display','none');
          }
          else if(document.getElementById('s2').checked) 
          {    
              $('#single-section').css('display','block');
              $('#multi-section').css('display','none');
          }
        });

        function  radio_check(id)
        {
           // alert('id');
           var size_id1 = 's1'+id;
           var size_id2 = 's2'+id;
           if (document.getElementById(size_id1).checked) {
             $('#multi-section'+id).css('display','block');
             $('#single-section'+id).css('display','none');
           } else if (document.getElementById(size_id2).checked) {
              $('#single-section'+id).css('display','block');
              $('#multi-section'+id).css('display','none');
            }  
        }
  </script>
  
</html>
