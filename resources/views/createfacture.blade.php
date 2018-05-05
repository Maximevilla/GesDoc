@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')


          <!-- /.row -->


          <div class="panel-body">
          <div class="row">
              <div class="">
                  <form method="POST" action="{{route('factures.store')}}" accept-charset="UTF-8" id="invoice_form" role="form">
                    {{ csrf_field() }}
                  <div class="col-md-12">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="saveInvoice"><i class="fa fa-save"></i> Valider Facture</button>
                    </div>
                      <div class="col-md-7" style="padding: 0px">
                          <div class="contact to">
                              <div class="form-group">
                                  <label for="client">Client</label>
                                  <div class="input-group col-md-9">
                                      <select class="form-control chosen input-sm" id="client" required="required" name="client">
                                        @foreach($patients as $pat)
                                        <option value="{{$pat->id}}">{{$pat->nom}} {{$pat->prenom}}</option>
                                        @endforeach
                                        </select>

                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="currency">Monnaie</label>
                                  <div class="input-group col-md-9">
                                      <select class="form-control input-sm chosen" required="required" id="currency" name="currency"><option value="AFN(؋)">Afghanistan, Afghani</option><option value="AOA(Kz)">Angola, Kwanza</option><option value="LBP(ل.ل.‏)">Lebanese Pound</option><option value="SAR(﷼)">Saudi Riyal</option><option value="TZS(TSh)">Tanzanian Shilling</option><option value="NGN(₦)">Nigeria, Naira</option><option value="EUR(€)">Euro</option><option value="USD($)">US Dollar</option><option value="AZN(₼)">Azerbaijanian Manat</option><option value="GBP(£)">Pound Sterling</option><option value="BIF(FBu)">Burundi Franc</option><option value="PLN(zł)">Poland, Zloty</option><option value="ARS($)">Argentine Peso</option><option value="MZN(MT)">Mozambique Metical</option><option value="KES(S)">Kenyan Shilling</option><option value="ALL(Lek)">Albania, Lek</option><option value="LKR(₨)">Sri Lanka Rupee</option><option value="GIP(£)">Gibraltar Pound</option><option value="GHS(₵)">Ghana Cedi</option><option value="INR(₹)">Indian Rupee</option></select>
                                  </div>
                              </div>


                          </div>
                      </div>
                      <div class="col-md-5" style="padding: 0px">
                          <div class="form-group">
                              <label for="invoice_date">Date</label>
                              <input class="form-control datetimepicker input-sm" id="datetimepicker"  required="required" data-provide="datetimepicker" name="invoice_date" type="text" value="{{Carbon\Carbon::now()->format('m/d/Y')}}">
                          </div>

                          <div class="form-group">
                              <label for="status">Statut</label>
                              <select class="form-control chosen required input-sm" name="status" id="status">
                                                              <option value="0"> A Payer </option>
                                                              <option value="1"> Partiellement Paye </option>
                                                              <option value="2"> Paye </option>
                                                              <option value="3"> Trop Paye </option>
                                                      </select>
                          </div>

                      </div>
              </div>
              <div class="col-md-12">
                  <table class="table table-striped" id="item_table">
                      <thead class="item-table-header">
                      <tr>
                          <th width="5%"></th>
                          <th width="20%">Produit</th>
                          <th width="35%">Description</th>
                          <th width="10%" class="text-center">Quantite</th>
                          <th width="10%" class="text-center">Prix</th>
                          <th width="10%" class="text-center">Taxe</th>
                          <th width="10%"class="text-right">Total</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr class="item">
                              <td></td>
                              <td><div class="form-group"><input class="form-control input-sm item_name" id="item_name" required="required" name="item_name" type="text"></div></td>
                              <td><div class="form-group"><textarea class="form-control item_description input-sm" id="item_description" rows="1" style="resize: vertical;text-transform: capitalize;" name="item_description" cols="50"></textarea></div></td>
                              <td><div class="form-group"><input class="form-control calcEvent quantity input-sm" data-bind="value: quantity" id="quantity" required="required" step="any" min="0" name="quantity" type="number"></div></td>
                              <td><div class="form-group"><input class="form-control calcEvent price input-sm" data-bind="value: price" id="price" required="required" step="any" min="0" name="price" type="number"></div></td>
                              <td><div class="form-group"><input class="form-control calcEvent tax " data-bind="value: tax" id="tax" name="tax"></div></td>
                              <td class="text-right"><span class="itemTotal"><span data-bind="text: total"></span></td>
                          </tr>
                      </tbody>
                  </table>
              </div><!-- /.col -->
              <div class="col-md-6">
                  <span id="btn_add_row" class="btn btn-xs btn-info "><i class="fa fa-plus"></i> Ajouter Ligne</span>
              </div><!-- /.col -->
              <div class="col-md-6">
                  <table class="table">
                      <tbody>
                      <tr>
                          <th style="width:50%">Sous Total</th>
                          <td class="text-right">
                              <span id="subTotal">0.00</span>
                          </td>
                      </tr>
                      <tr>
                          <th>Taxe</th>
                          <td class="text-right">
                              <span id="taxTotal">0.00</span>
                          </td>
                      </tr>
                      <tr>
                          <th style="vertical-align: middle">
                              Rabais
                              <select class="text-right input-sm calcEvent" id="discount_mode" style="width:50%" name="discount_mode"><option value="1">%</option><option value="0">Amount</option></select>
                          </th>
                          <td class="text-right">
                              <div class="form-group">
                              <input class="form-control text-right calcEvent input-sm" id="discount" step="any" min="0" name="discount" type="number">
                             </div>
                          </td>
                      </tr>
                      <tr class="amount_due">
                          <th>Total:</th>
                          <td class="text-right">
                              <span class="currencySymbol" style="display: inline-block;"></span>
                              <span id="grandTotal">0.00</span>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="notes">Notes</label>
                      <textarea id="my-editor"  class="form-control"rows="2" name="notes" cols="50" id="notes">{!! old('content', '') !!}</textarea>
                      <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                      <script>
                      var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                      };
                    </script>

                  </div>
                  <div class="form-group">
                      <label for="terms">Terms</label>
                      <textarea id="terms"  class="form-control"rows="2" name="terms" cols="50" id="notes">{!! old('content', '') !!}</textarea>
                      <script>
                      var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                      };
                    </script>
                  </div>
              </div>

              </form>
              </div>
              </div>
             </div>

@endsection

@section('js')
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js'></script>


<!-- jQuery 2.1.3 -->
<script src="http://ci.elantsys.com/assets/js/jquery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="http://ci.elantsys.com/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap Dialog -->
<script src="http://ci.elantsys.com/assets/js/bootstrap-dialog.js"></script>
<!-- Jquery Datatables -->
<script src="http://ci.elantsys.com/assets/js/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="http://ci.elantsys.com/assets/js/datatables.js"></script>
<!-- Pace.js -->
<script src="http://ci.elantsys.com/assets/js/pace.min.js"></script>
<!-- summernote.js javascript -->
<script src="http://ci.elantsys.com/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- datepicker.js javascript-->
<script src="http://ci.elantsys.com/assets/plugins/pikaday/moment.js"></script>
<script src="http://ci.elantsys.com/assets/plugins/pikaday/pikaday.js"></script>
<script src="http://ci.elantsys.com/assets/plugins/pikaday/pikaday.jquery.js"></script>
<!-- chosen.js javascript-->
<script src="http://ci.elantsys.com/assets/plugins/chosen/chosen.jquery.js"></script>
<script src="http://ci.elantsys.com/assets/plugins/animsition/js/jquery.animsition.min.js" type="text/javascript"></script>
<!-- validator.js javascript-->
<script src="http://ci.elantsys.com/assets/js/validator.min.js"></script>
<!-- toastr.js javascript-->
<script src="http://ci.elantsys.com/assets/plugins/amaranjs/js/jquery.amaran.min.js"></script>
<!-- custom.js -->
<!-- custom.js -->
<script>



$(document).on('click', '#btn_add_row', function() {
    cloneRow('item_table');
});
$( document ).on('change', '#currency', function() {
    if ( $(this).val() != '') {
        $( '.currencySymbol' ).text( $( "[name='currency']").val() );
    }
});



</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script>
CKEDITOR.replace('my-editor', options);
CKEDITOR.replace('terms', options);
</script>


<script type="text/javascript">
$(function(){
   $('tr.item select').chosen({width:'100%'});
   $('.text_editor').wysihtml5({image:false,link:false});
   $( document ).on("click change paste keyup", ".calcEvent", function() {
       calcTotals();
   });

   $(document).on('click', '.delete_row', function(){
       $(this).parents('tr').remove();
       calcTotals();
   });
   $( document ).on('click', '.deleteItem', function() {
       var $this = $(this);
       BootstrapDialog.show({
           title: 'Deleting a Record',
           message: 'Are you sure you want to delete this record. This action cannot be undone.',
           buttons: [ {
               icon: 'fa fa-check',
               label: ' Yes',
               cssClass: 'btn-success btn-xs',
               action: function(dialogItself){
                       $this.parents('tr').remove();
                       calcTotals();

               }
           }, {
               icon: 'fa fa-remove',
               label: 'No',
               cssClass: 'btn-danger btn-xs',
               action: function(dialogItself){
                   dialogItself.close();
               }
           }]
       });
   });



   $(document).on('click', '#change_invoice_num', function(){
       $("#number").prop("readonly", false);
   });
});
function calcTotals(){
       var subTotal    = 0;
       var total       = 0;
       var amountDue   = 0;
       var totalTax    = 0;
       $('tr.item').each(function(){
           var quantity    = parseFloat($(this).find("[id='quantity']").val());
           var price        = parseFloat($(this).find("[id='price']").val());
           var itemTax     = $(this).find("[id='tax']").val();
           var itemTotal   = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0;
           var taxValue    = parseFloat($(this).find("[id='tax']").val());
           subTotal        += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
           totalTax        += parseFloat(price * quantity * taxValue/100) > 0 ? parseFloat(price * quantity * taxValue/100) : 0;
           $(this).find(".itemTotal").text( itemTotal.toFixed(2) );
       });
       var discount_mode = parseInt($("[name='discount_mode']").val());
       var discount    = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
       var paid        = parseFloat($("#paidAmount").val()) > 0 ? parseFloat($("#paidAmount").val()) : 0;
       var discount_amount = discount_mode == 1 ? subTotal * (discount/100) : discount;
       total           += parseFloat(subTotal+totalTax-discount_amount);
       amountDue       += parseFloat(subTotal+totalTax-discount_amount-paid);
       $( '#subTotal' ).text( subTotal.toFixed(2) );
       $( '#taxTotal' ).text( totalTax.toFixed(2) );
       $( '#grandTotal' ).text( total.toFixed(2) );
       $( '#amountDue' ).text( amountDue.toFixed(2) );
}
var count = "1";
function cloneRow(in_tbl_name)
{
       var tbody = document.getElementById(in_tbl_name).getElementsByTagName("tbody")[0];
       // create row
       var row = document.createElement("tr");
       // create table cell 1
       var td1 = document.createElement("td");
       var strHtml1 = "<span class='btn btn-danger btn-xs delete_row'><i class='fa fa-minus'></i></span> ";
       td1.innerHTML = strHtml1.replace(/!count!/g,count);
       // create table cell 2
       var td2 = document.createElement("td");
       var strHtml2 = '<div class="form-group"><input class="form-control input-sm item_name" id="item_name" required="required" name="item_name'+count+'" type="text"></div>';
       td2.innerHTML = strHtml2.replace(/!count!/g,count);
       // create table cell 3
       var td3 = document.createElement("td");
       var strHtml3 = '<div class="form-group"><textarea class="form-control item_description input-sm" id="item_description" rows="1" style="resize: vertical;text-transform: capitalize;" name="item_description'+count+'" cols="50"></textarea></div>';
       td3.innerHTML = strHtml3.replace(/!count!/g,count);
       // create table cell 4
       var td4 = document.createElement("td");
       var strHtml4 = '<div class="form-group"><input class="form-control input-sm calcEvent quantity" data-bind="value: quantity" id="quantity" required="required" step="any" min="0" name="quantity'+count+'" type="number"></div> ';
       td4.innerHTML = strHtml4.replace(/!count!/g,count);
       // create table cell 5
       var td5 = document.createElement("td");
       var strHtml5 = '<div class="form-group"><input class="form-control input-sm calcEvent price" data-bind="value: price" id="price" required="required" step="any" min="0" name="price'+count+'" type="number"></div> ';
       td5.innerHTML = strHtml5.replace(/!count!/g,count);
       // create table cell 6
       var td6 = document.createElement("td");
       var strHtml6 = '<div class="form-group"><input class="form-control input-sm calcEvent tax" data-bind="value: tax" id="tax" name="tax'+count+'"></div> ';
       td6.innerHTML = strHtml6.replace(/!count!/g,count);
       // create table cell 7
       var td7 = document.createElement("td");
       var strHtml7 = '<span class="itemTotal"> <span data-bind="text: total"> </span> ';
       td7.innerHTML = strHtml7.replace(/!count!/g,count);
       td7.className = 'text-right';
       // append data to row
       row.appendChild(td1);
       row.appendChild(td2);
       row.appendChild(td3);
       row.appendChild(td4);
       row.appendChild(td5);
       row.appendChild(td6);
       row.appendChild(td7);
       // add to count variable
       count = parseInt(count) + 1;
       // append row to table
       tbody.appendChild(row);
       row.className = 'item';
       $('tr.item:last select').chosen({width:'100%'});
}
</script>

<script type="text/javascript">
   $(function(){
       /*-----------------------------------------------------------
        Delete Button clicked
        --------------------------------------------------------------*/
       $(document).on('click', '.btn-delete', function (e){e.preventDefault(); confirm_dialog($(this).parent('form')); });
       function confirm_dialog(form){
           BootstrapDialog.show({
               title: 'Deleting a Record',
               message: 'Are you sure you want to delete this record. This action cannot be undone.',
               buttons: [ {
                   icon: 'fa fa-check',
                   label: 'Yes',
                   cssClass: 'btn-success btn-xs pull-left',
                   action: function(){
                       form.submit();
                   }
               }, {
                   icon: 'fa fa-remove',
                   label: 'No',
                   cssClass: 'btn-danger btn-xs pull-right',
                   action: function(dialogItself){
                       dialogItself.close();
                   }
               }]
           });
           return false;
       }
   });
</script>
@endsection
