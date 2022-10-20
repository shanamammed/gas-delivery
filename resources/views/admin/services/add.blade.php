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
                  <h4 class="page-title float-left">ADD SERVICE</h4>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card-box">
                <form  id="Myform" action="#" method="post" enctype="multipart/form-data">
                  <div id="add_data">
                     <div class="form-row">
                        <div class="col-md-12">
                          <label>Service Name<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_name" class="form-control"  placeholder="Name" required>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label>Service Type<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" name="service_type" class="form-control"  placeholder="Name" required>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-6">
                          <label>Has any sub type?<span style="color: red;">*</span></label>
                          <div class="input-group">
                           <input type="radio" name="size" id="s1" value="yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes
                          </div><br>
                          <div class="input-group">
                             <input type="radio" name="size" id="s2" value="no">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No
                          </div>
                        </div>
                      </div>
                      <div class="form-row" id="single-section" style="display:none;">
                        <br>
                        <div class="col-md-6">
                          <label>Price<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="number" step="any" min="0" name="single_price" id="single_price" class="form-control"  placeholder="Price">
                          </div>
                        </div>
                        <br>
                      </div>
                      <div id="multi-section" style="display:none;">
                          <p class="mb-1 mt-4 font-weight-bold">Price<span style="color: red;">*</span></p>
                          <div class="">
                            <div class="form-group">
                              <div class="col-12">
                                <table id="product-priceSize">
                                  <thead>
                                    <tr>
                                      <td width="60%">Size</td>
                                      <td width="50%">Price</td>
                                      <td width="40%">Delete</td>
                                    </tr>
                                  </thead>
                                  <tr>
                                    <td><input type="text" class="form-control quantity" name="unit[]" id="unit"></td>
                                    <td><input type="number" class="form-control price" id="multi_price" name="price[]" min"0" step="any"></td>
                                    <td style="text-align:center;"> - </td>
                                  </tr>
                                </table>
                                <div class="text-center">
                                  <button type="button" class="btn btn-link" onclick="addRowSize()"><i style="font-size:25px;" class="fa fa-plus-circle"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <br>
                    <div id="Choices">
                        
                    </div>
                     
                    <br>
                    <div id="add-more">

                    </div>
                   
                    <div  id="add-section">
                      <div class="form-row" >
                         <button type="button" class="btn btn-primary" style="color: blue;" onclick="addRow1()">Add more service types</button>
                      </div> 
                    </div>
                    
                    
                     <!--<div class="text-center">-->
                     <!--     <button type="button" class="btn btn-link" onclick="addRow1()"><i style="font-size:25px;" class="fa fa-plus-circle"></i></button>-->
                     <!--</div>-->
                      
                  </div>
                  
                  <div id="Products">
                 
                  </div> 

                <div class="form-row">
                  <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-success waves-light waves-effect w-md pull-right" id="submit-button" style="display:block;">Add</button>
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
  <script type="">
    $("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
         $(document).ready(function() {
         $('.js-example-basic-single').select2();
         });
    </script>
    <script>
      $(document).on('change','input:radio[name="choice_type"]',function(){
          if (document.getElementById('r1').checked) 
          {
            $('#choice-section').css('display','block');
            
          }
          else if(document.getElementById('r2').checked) 
          {
              $('#choice-section').css('display','none');
              $('#copy-section').css('display','none');
              $('#add-section').css('display','none');
              $('#Choices').css('display','none');
          }
        });
        
        $(document).on('change','input:radio[name="choice_option"]',function(){
          if (document.getElementById('c1').checked) 
          {
            $('#add-section').css('display','block');
            $('#copy-section').css('display','none');
          }
          else if(document.getElementById('c2').checked) 
          {    
              $('#copy-section').css('display','block');
              $('#add-section').css('display','none');
          }
        });
        
         $(document).on('change','input:radio[name="size"]',function(){
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
       
    </script>

    <script type="">
        $('#Myform').on('submit', function(e){
         e.preventDefault();    
          code       = $('#code').val();
          size       = $('input[name="size"]:checked').val();
        
                    if(size=='no')
                    {
                        s_price  = $('#single_price').val();
                        // alert(s_price);
                        if(s_price=='')
                        {
                            toastr.error("","Please add a valid price");
                        }
                        else
                        {
                           document.getElementById("Myform").submit();
                           return true;  
                        }
                    }
                    else if(size=='yes')
                    {
                        m_unit = $('#unit').val();
                        m_price= $('#multi_price').val();
                        
                        if(m_unit=='')
                        {
                            toastr.error("","Please add a valid unit");
                        }
                        else if(m_price=='')
                        {
                            toastr.error("","Please add a valid price");
                            return false;
                        }
                        else
                        {
                            document.getElementById("Myform").submit();
                            return true; 
                        }
                    }
      
      });
  </script>
  <script type="text/javascript">
    var im = 1;
    var image;
    var image_id;
    function addRow1()
    { 
      
      imageid = 'image' + im;
      inputid = 'img' + im;
      preview = 'preview' + im;
      tab_id  = "price" + im;
      image = "<div id='"+ imageid +"'>\
                 <div class='form-row'>\
                   \
                 </div>\
                 <div class='form-row'>\
                         <div class='col-md-12'>\
                              <div class='>\
                                <div class='form-group m-b-25'>\
                                  <div class='col-md-12'>\
                                    <table id>\
                                      <thead>\
                                        <tr>\
                                          <td width='35%'>Category Name</td>\
                                          <td width='20%'>Type</td>\
                                          <td width='30%'>Selection Type</th>\
                                          <td width='30%'>Quantity</td>\
                                          <td width='20%'>Delete</td>\
                                        </tr>\
                                      </thead>\
                                      <tr>\
                                         <input type='hidden' name='values[]' value='"+im+"'>\
                                        <td><input type='text' class='form-control quantity' placeholder='Category Name' name='cat_name"+im+"[]' required></td>\
                                        <td>\
                                          <select class='form-control' name='c_type"+im+"[]' required>\
                                              <option value=''>--Choose One--</option>\
                                              <option value='add'>Add</option>\
                                              <option value='remove'>Remove</option>\
                                          </select>\
                                        </td>\
                                        <td>\
                                          <select class='form-control' name='selection_type"+im+"[]' required>\
                                              <option value=''>--Choose One--</option>\
                                              <option value='1'>Required</option>\
                                              <option value='0'>Not Required</option>\
                                          </select>\
                                        </td>\
                                        <td><input type='number' min='0' step='any' class='form-control quantity' placeholder='Quantity' name='type"+im+"[]' required></td>\
                                        <td style='text-align:center;'> <button type='button' class='btn btn-link pull-left' onclick='delete_div(this)' id='"+ im +"'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></button> </td>\
                                      </tr>\
                                    </table>\
                                    <br>\
                                    <table id='"+tab_id+"'>\
                                      <thead>\
                                        <tr>\
                                          <td width='60%'>Category Value</td>\
                                          <td width='40%'>Price</td>\
                                          <td width='20%'>Delete</td>\
                                        </tr>\
                                      </thead>\
                                      <tr>\
                                        <td><input type='text' class='form-control' placeholder='Category Value' name='cat_value"+im+"[]' required></td>\
                                        <td><input type='number' min='0' step='any' class='form-control' name='value_price"+im+"[]  placeholder='Price' required></td>\
                                        <td style='text-align:center;'> - </td>\
                                      </tr>\
                                    </table>\
                                    <p><button type='button' class='btn btn-link' onclick='addRow2(`"+ im +"`)'>Add more values</button></p>\
                                  </div>\
                                </div>\
                              </div>\
                          </div>\
                      </div>";
      $('#add-more').append(image);
      im = im + 1;
    }
    function addRow()
    {   
        var col1 = "<tr><td><input type='text' class='form-control' name='cat_value[]' placeholder='Category Value' required></td>";
        var col2 = "<td><input type='number' min='0' step='any' class='form-control' name='value_price[]'  placeholder='Price' required></td>";
        var col3 = "<td><a class='btn btn-link' onclick='deleteRow(this);'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a></td></tr>";
        var row = col1 + col2 + col3;
        $('#product-price').append(row);
    }
    function addRow2(id)
    {   
        var res  = 'price'+id;
        // alert(res);
        var col1 = "<tr><td><input type='text' class='form-control' name='cat_value"+id+"[]' placeholder='Category Value' required></td>";
        var col2 = "<td><input type='number' min='0' step='any' class='form-control' name='value_price"+id+"[]'  placeholder='Price' required></td>";
        var col3 = "<td><a class='btn btn-link' onclick='deleteRow(this);'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a></td></tr>";
        var row = col1 + col2 + col3;
        $('#price'+id).append(row);
    }
    
    function addRowSize()
    {   
        var col1 = "<tr><td><input type='text' class='form-control' name='unit[]' required></td>";
        var col2 = "<td><input type='number' class='form-control' step='any' min='0' name='price[]' required></td>";
        var col3 = "<td><a class='btn btn-link' onclick='deleteRow(this);'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></a></td></tr>";
        var row = col1 + col2 + col3;
        $('#product-priceSize').append(row);
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

    

    
   function preview_image(id) 
    {
        var id = id.id;
        var x = document.getElementById(id);
        var size = x.files[0].size;
        if (size > 5000000) {
           toastr.error("Failed","Please select an image with size less than 5 mb.");
          document.getElementById(id).value = "";
        }
        else {
          var val = x.files[0].type;
          var type = val.substr(val.indexOf("/") + 1);
          s_type = ['jpeg','jpg','png'];
          var flag = 0;
          for (var i = 0; i < s_type.length; i++) {
            if (s_type[i] == type) {
              flag = flag + 1;
            }
          }
          if (flag == 0) {
            toastr.error("Failed","This file format is not supported.");
            document.getElementById(id).value = "";
          }
          else {
                let img = new Image()
                img.src = window.URL.createObjectURL(event.target.files[0])
                img.onload = () => {
                   if(img.width === 600 && img.height === 500)
                   {
                        var reader = new FileReader();
                        reader.onload = function()
                        {
                          var cn = id.substring(3);
                          var preview = 'preview' + cn;
                          var output = document.getElementById(preview);
                          output.src = reader.result;
                        }
                        reader.readAsDataURL(x.files[0]);
                    }
                    else
                    {
                        toastr.error(`Sorry, this image doesn't look like the size we wanted. It's ${img.width} x ${img.height} but we require 600 x 500 size image.`);
                        document.getElementById(id).value = "";
                    }
                }
          }

        }
    }
  </script>
  <script>
       function GetproductFilter(ProductId)
       {
           var GID= ProductId;
           var CategoryIDE=ProductId;
      
           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'getProductChoices' , true);
           xhr.setRequestHeader('Content-Type', 'application/json');
           xhr.send(JSON.stringify({
           CategoryIDE:CategoryIDE
           }));

           xhr.onreadystatechange = function() 
           {
               if (this.readyState == 4 && this.status == 200) 
               {
                  console.log('-------------------------------111--------------------------->>>')
                  var temp =xhr.responseText;
                  if (temp) 
                  {
                     temp= JSON.parse(temp);
                     document.getElementById('Choices').innerHTML =temp;
                  }
               }
           };        
       }
  </script>
   <script type="text/javascript">
     var imm = 0;
     var image;
     var image_id;
    function addRoww(id)
    { 
      im      = imm+id;
      imageid = 'image' + im;
      inputid = 'img' + im;
      preview = 'preview' + im;
      tab_id  = "price" + im;
      image = "<div id='"+ imageid +"'>\
                 <div class='form-row'>\
                   \
                 </div>\
                 <div class='form-row'>\
                         <div class='col-md-12'>\
                              <div class='>\
                                <div class='form-group m-b-25'>\
                                  <div class='col-md-12'>\
                                    <table id>\
                                      <thead>\
                                        <tr>\
                                          <td width='60%'>Category Name</td>\
                                          <td width='40%'>Type</td>\
                                          <th width='40%'>Selection Type</td>\
                                          <td width='20%'>Delete</td>\
                                        </tr>\
                                      </thead>\
                                      <tr>\
                                         <input type='hidden' name='values[]' value='"+im+"' >\
                                        <td><input type='text' class='form-control quantity' placeholder='Name' name='cat_name"+im+"[]' required></td>\
                                        <td>\
                                          <select class='form-control' name='type"+im+"[]' required>\
                                              <option value=''>---Select Type---</option>\
                                              <option value='1'>Single Choice</option>\
                                              <option value='2'>Multiple Choice</option>\
                                          </select>\
                                        </td>\
                                        <td>\
                                          <select class='form-control' name='selection_type"+im+"[]' required>\
                                              <option value=''>---Choose One---</option>\
                                              <option value='1'>Required</option>\
                                              <option value='0'>Not Required</option>\
                                          </select>\
                                        </td>\
                                        <td style='text-align:center;'> <button type='button' class='btn btn-link pull-left' onclick='delete_div(this)' id='"+ im +"'><i style='font-size:25px; color:red;' class='fa fa-trash'></i></button> </td>\
                                      </tr>\
                                    </table>\
                                    <br>\
                                    <table id='"+tab_id+"'>\
                                      <thead>\
                                        <tr>\
                                          <td width='60%'>Category Value</td>\
                                          <td width='40%'>Price</td>\
                                          <td width='20%'>Delete</td>\
                                        </tr>\
                                      </thead>\
                                      <tr>\
                                        <td><input type='text' class='form-control' placeholder='Name' name='cat_value"+im+"[]' required></td>\
                                        <td><input type='number' min='0' step='any' class='form-control' name='value_price"+im+"[]  placeholder='Price' required></td>\
                                        <td style='text-align:center;'> - </td>\
                                      </tr>\
                                    </table>\
                                    <p><button type='button' class='btn btn-link' onclick='addRow2(`"+ im +"`)'>Add more values</button></p>\
                                  </div>\
                                </div>\
                              </div>\
                          </div>\
                      </div>";
      $('#add-more').append(image);

      imm = imm + 1;
    }
    </script>
  <script type="text/javascript">
     $uploadCrop = $('#upload-demo').croppie({
      enableExif: true,
      viewport: {
          width: 300,
          height: 300,
          type: 'rectangle'
      },
      boundary: {
          width: 400,
          height: 400
      }
    });


   $('#upload').on('change', function () {
    $("#submit-button").css("display", "none");
    var file = $("#upload")[0].files[0];
    var val = file.type;
    var type = val.substr(val.indexOf("/") + 1);
    if (type == 'png' || type == 'jpg' || type == 'jpeg') {

      $("#current-image").css("display", "none");
      $("#submit-button").css("display", "none");

      $(".upload-div").css("display", "block");
      $("#submit-button").css("display", "none");
      var reader = new FileReader();
        reader.onload = function (e) {
          $uploadCrop.croppie('bind', {
            url: e.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });

        }
        reader.readAsDataURL(this.files[0]);
    }
    else {
      // alert('This file format is not supported.');
      toastr.error("This file format is not supported.");
      document.getElementById("upload").value = "";
      $("#upload-result").css("display", "none");
      $("#submit-button").css("display", "none");
      $("#current-image").css("display", "block");
      $('#ameimg').val('');
    }
  });


  $('#crop-button').on('click', function (ev) {
      $("#submit-button").css("display", "block");
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (resp) {
      html = '<img src="' + resp + '" />';
      $("#upload-result").html(html);
      $("#upload-result").css("display", "block");
      $(".upload-div").css("display", "none");
      $("#submit-button").css("display", "block");
      $('#ameimg').val(resp);
    });
  });
  </script>
  <script type="text/javascript">
         $uploadCrop1 = $('#upload-demo1').croppie({
          enableExif: true,
          viewport: {
              width: 750,
              height: 500,
              type: 'rectangle'
          },
          boundary: {
              width: 800,
              height: 600
          }
        });
    
    
       $('#upload1').on('change', function () {
        $("#submit-button").css("display", "none");
        var file = $("#upload1")[0].files[0];
        var val = file.type;
        var type = val.substr(val.indexOf("/") + 1);
        if (type == 'png' || type == 'jpg' || type == 'jpeg') {
    
          $("#current-image").css("display", "none");
          $("#submit-button").css("display", "none");
    
          $(".upload-div1").css("display", "block");
          $("#submit-button").css("display", "none");
          var reader = new FileReader();
            reader.onload = function (e) {
              $uploadCrop1.croppie('bind', {
                url: e.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
    
            }
            reader.readAsDataURL(this.files[0]);
        }
        else {
          // alert('This file format is not supported.');
          toastr.error("This file format is not supported.");
          document.getElementById("upload1").value = "";
          $("#upload-result1").css("display", "none");
          $("#submit-button").css("display", "none");
          $("#current-image").css("display", "block");
          $('#ameimg1').val('');
        }
      });
    
    
      $('#crop-button1').on('click', function (ev) {
          $("#submit-button").css("display", "block");
        $uploadCrop1.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function (resp1) {
          html1 = '<img src="' + resp1 + '" />';
          $("#upload-result1").html(html1);
          $("#upload-result1").css("display", "block");
          $(".upload-div1").css("display", "none");
          $("#submit-button").css("display", "block");
          $('#ameimg1').val(resp1);
        });
      });
  </script>
</html>
