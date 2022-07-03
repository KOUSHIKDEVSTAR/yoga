<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-add-wrapper">
                <div class="row invoice-add">
                    <!-- Invoice Add Left starts -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">
                            <!-- Header starts -->
                            <div class="card-body invoice-padding pb-0">
                                <div
                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                                <defs>
                                                    <linearGradient id="invoice-linearGradient-1" x1="100%"
                                                        y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                        <stop stop-color="#000000" offset="0%"></stop>
                                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="invoice-linearGradient-2" x1="64.0437835%"
                                                        y1="46.3276743%" x2="37.373316%" y2="100%">
                                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                    </linearGradient>
                                                </defs>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-400.000000, -178.000000)">
                                                        <g transform="translate(400.000000, 178.000000)">
                                                            <path class="text-primary"
                                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                                style="fill: currentColor"></path>
                                                            <path
                                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                                fill="url(#invoice-linearGradient-1)" opacity="0.2">
                                                            </path>
                                                            <polygon fill="#000000" opacity="0.049999997"
                                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                            </polygon>
                                                            <polygon fill="#000000" opacity="0.099999994"
                                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                            </polygon>
                                                            <polygon fill="url(#invoice-linearGradient-2)"
                                                                opacity="0.099999994"
                                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <h3 class="text-primary invoice-logo">FitPlus </h3>
                                        </div>
                                        <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                        <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                        <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                    </div>
                                    <!--  <div class="invoice-number-date mt-md-0 mt-2">
                                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                                <h4 class="invoice-title">Invoice</h4>
                                                <div class="input-group input-group-merge invoice-edit-input-group">
                                                    <div class="input-group-text">
                                                        <i data-feather="hash"></i>
                                                    </div>
                                                    <input type="text" class="form-control invoice-edit-input" placeholder="53634" />
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="title">Date:</span>
                                                <input type="text" class="form-control invoice-edit-input date-picker" />
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="title">Due Date:</span>
                                                <input type="text" class="form-control invoice-edit-input due-date-picker" />
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                            <!-- Header ends -->

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row row-bill-to invoice-spacing">
                                    <div class="col-xl-8 mb-lg-1 col-bill-to ps-0">
                                        <h6 class="invoice-to-title">Invoice To:</h6>
                                        <div class="invoice-customer">
                                            <select class="invoiceto form-select select2" id="cust_data">
                                                <option>Choose Customer</option>
                                                <?php foreach($customer_details as $cust){?>
                                                <option value="<?= $cust->cust_id;?>"><?= $cust->full_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="customer-details" id="customer">

                                        </div>
                                    </div>
                                    <!-- <div class="col-xl-4 p-0 ps-xl-2 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pe-1">Total Due:</td>
                                                        <td><strong>$12,110.55</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Bank name:</td>
                                                        <td>American Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Country:</td>
                                                        <td>United States</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">IBAN:</td>
                                                        <td>ETD95476213874685</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">SWIFT code:</td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                </div>
                            </div>
                            <!-- Address and Contact ends -->

                            <!-- Product Details starts -->
                            <div class="card-body invoice-padding invoice-product-details">
                                <form class="source-item" action="<?= base_url('sales/store');?>"
                                    enctype="multipart/form-data" method="POST">
                                    <div data-repeater-list="group-a">
                                        <div class="repeater-wrapper" data-repeater-item>
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex product-details-border position-relative pe-0">
                                                    <div class="row w-100 pe-lg-0 pe-1 py-2">
                                                        <input type="hidden" name="customer_id" id="customer_id"
                                                            value="">
                                                        <div class="col-lg-6 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">Type</p>
                                                            <select class="form-select item-details" id="type_id"
                                                                name="type_id" required="">
                                                                <option value="">Choose One</option>
                                                                <?php foreach($tax_info as $tax){?>
                                                                <option value="<?= $tax->tax_id  ;?>">
                                                                    <?= $tax->template_name;?></option>

                                                                <?php  } ?>

                                                            </select>
                                                            

                                                        </div>
                                                        <div class="col-lg-6 col-3 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">Product &
                                                                Membership Type</p>
                                                            <select class="form-select item-details" id="product_div"
                                                                name="product_id" required="">
                                                                <option value="">Choose One</option>

                                                            </select>
                                                            

                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Cost</p>
                                                            <input type="text" name="cost" id="cost"
                                                                class="form-control" value="" required="" readonly="">


                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Quantity
                                                            </p>
                                                            <input type="number" name="qty" id="qty"
                                                                class="form-control" value="1" required="">


                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Tax(%)</p>
                                                            <input type="text" name="tax" id="tax" class="form-control"
                                                                value="" required="" readonly="">


                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Discount
                                                            </p>
                                                            <input type="number" name="discount" id="discount"
                                                                class="form-control" value="" required="">


                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Total
                                                                Price</p>
                                                            <input type="text" name="total_price" class="form-control"
                                                                id="total_price" value="" required="" readonly="">


                                                        </div>
                                                        <div class="col-lg-4 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Received
                                                                Type</p>
                                                            <select class="form-select item-details" name="recved_type"
                                                                required="">
                                                                <option value="">Choose One</option>
                                                                <option value="Card">Card</option>
                                                                <option value="Cash">Cash</option>


                                                            </select>


                                                        </div>

                                                        <div class="col-lg-6 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Received
                                                                Amount</p>
                                                            <input type="text" name="recved_amnt" value=""
                                                                class="form-control" id="recved_amnt" required="">

                                                        </div>
                                                        <div class="col-lg-6 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">Due Amount
                                                            </p>
                                                            <input type="text" name="due_amt" value=""
                                                                class="form-control" required="" id="due_amt"
                                                                readonly="">

                                                        </div>
                                                        <div class="col-lg-6 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">
                                                                Transcation Id</p>
                                                            <input type="text" name="tranac_id" value=""
                                                                class="form-control">

                                                        </div>
                                                        <div class="col-lg-6 col-3 mb-lg-0 mb-2 mt-lg-0 ">
                                                            <p class="card-text col-title mb-md-50 mb-0 mt-2">
                                                                Transcation Attachments</p>
                                                            <input type="file" name="transc_attachments" value=""
                                                                class="form-control">

                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 px-0">
                                            <button type="submit" class="btn btn-primary btn-sm btn-add-new"
                                                data-repeater-create>Add Sale


                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Product Details ends -->

                            <!-- Invoice Total starts -->
                            <div class="card-body invoice-padding">
                                <div class="row invoice-sales-total-wrapper">
                                    <!-- <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <label for="salesperson" class="form-label">Salesperson:</label>
                                                <input type="text" class="form-control ms-50" id="salesperson" placeholder="Edward Crowley" />
                                            </div>
                                        </div> -->
                                    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                        <div class="invoice-total-wrapper">
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Subtotal:</p>
                                                <p class="invoice-total-amount"><span id="sub_total"></span></p>
                                            </div>
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title"> Discount:</p>
                                                <p class="invoice-total-amount"><span id="dis_total"></span></p>
                                            </div>
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Tax:</p>
                                                <p class="invoice-total-amount"><span id="tax_total"></span>%</p>
                                            </div>
                                            <hr class="my-50" />
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Total:</p>
                                                <p class="invoice-total-amount"><span id="t_total"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Total ends -->

                            <hr class="invoice-spacing mt-0" />

                            <div class="card-body invoice-padding py-0">
                                
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Add Left ends -->

                    <!-- Invoice Add Right starts -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary w-100 mb-75" disabled>Send Invoice</button>
                                <a href="./app-invoice-preview.html"
                                    class="btn btn-outline-primary w-100 mb-75">Preview</a>
                                <button type="button" class="btn btn-outline-primary w-100">Save</button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="mb-50">Accept payments via</p>
                            <select class="form-select">
                                <option value="Bank Account">Bank Account</option>
                                <option value="Paypal">Paypal</option>
                                <option value="UPI Transfer">UPI Transfer</option>
                            </select>
                            <div class="invoice-terms mt-1">
                                <div class="d-flex justify-content-between">
                                    <label class="invoice-terms-title mb-0" for="paymentTerms">Payment Terms</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="paymentTerms" />
                                        <label class="form-check-label" for="paymentTerms"></label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <label class="invoice-terms-title mb-0" for="clientNotes">Client Notes</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" checked id="clientNotes" />
                                        <label class="form-check-label" for="clientNotes"></label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="invoice-terms-title mb-0" for="paymentStub">Payment Stub</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="paymentStub" />
                                        <label class="form-check-label" for="paymentStub"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Add Right ends -->
                </div>

                
            </section>

        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(e) {
    $('#cust_data').on('change', function(e) {
        $('#customer').prop('id', null);
        $(".customer-details").empty();

        var cust_id = $('#cust_data').val();
        $('#customer_id').val(cust_id);
        var base_url = '<?= base_url();?>';
        $.ajax({
            url: base_url + 'sales/cust_by_id',
            data: {
                id: cust_id,
            },
            dataType: "json",
            type: "POST",
            async: true,
            success: function(data) {
                data = data.data.customer_details[0];
                console.log("Data", data.full_name);
                $(".customer-details").append("<p>" + data.full_name + "</p>");
                $(".customer-details").append("<p>" + data.email + "</p>");
                $(".customer-details").append("<p>" + data.mobile_number + "</p>");
                $(".customer-details").append("<p>" + data.address + "</p>");
            }
        });

    });

});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#type_id').on('change', function(e) {
        var type_id = $('#type_id').val();
        var base_url = '<?= base_url();?>';
        $.ajax({
            url: base_url + 'sales/allProductByTypeId',
            data: {
                id: type_id,
            },
            dataType: "json",
            type: "POST",
            async: true,
            success: function(data) {
                data_sub = data.data.subscription_details[0];

                data = data.data.mebember_product_details;


                if (data.length > 0) {
                    $('#product_div').empty();
                    
                    data.forEach(element => {
                        $('#product_div').append(
                            `<option value=${element.memberlist_id }>${element.name}</option>`
                        );
                    });
                    data.endforEach;
                    $("#product_div").trigger('change');
                } else {
                    $('#product_div').empty();
                    $('#product_div').append(
                        `<option >No Data Found</option>`);
                    $("#product_div").trigger('change');
                }
                $('#tax').val(data_sub.percentage);

            }
        });

    });
});
</script>

<script type="text/javascript">
$(document).ready(function(e) {
    $('#product_div').on('change', function(e) {
        var product_id = $('#product_div').val();
        var base_url = '<?= base_url();?>';
        $.ajax({
            url: base_url + 'sales/productMemberShipByid',
            data: {
                id: product_id,
            },
            dataType: "json",
            type: "POST",
            async: true,
            success: function(data_mem) {
                // data_da = data_mem.data_mem.products_member_details[0];
                data_da = data_mem.data_mem.products_member_details[0];
                console.log("Data", data_da);
                $('#cost').val(data_da.dis_price);

            }
        });

    });

});
</script>
<!--  <script type="text/javascript">
        $(document).ready(function(e){
            $('#subscription_id').on('change',function(e){
                var subscription_id = $('#subscription_id').val();
                var base_url = '<?= base_url();?>';
            $.ajax({
                url: base_url + 'sales/subscription_by_id',
                data: {
                    id: subscription_id,
                },
                dataType: "json",
                type: "POST",
                async: true,
                success: function(data) {
                    data = data.data.subscription_details[0];
                    console.log("Data",data);
                    $('#tax').val(data.percentage);
                }
                });

            });

        });
    </script> -->
<script type="text/javascript">
$(document).ready(function(e) {
    $('#discount').on('keyup', function(e) {
        $("#sub_total").empty();
        $("#dis_total").empty();
        $("#tax_total").empty();
        $("#t_total").empty();
        var discount = $('#discount').val();
        var tax = $('#tax').val();
        var cost = $('#cost').val();
        var qty = $('#qty').val();

        if (discount > 100) {
            alert('discount only in between 1 t0 100');
            $('#discount').val(0);

        }
        var total_cost = cost * qty;
        var total_discount = total_cost - discount;
        // var total_tax_Amnt = tax/100;
        var price_total = parseFloat((total_discount * tax) / 100);
        var total_price = price_total + total_discount;
        $('#total_price').val(total_price);

        $('#sub_total').prepend(total_cost);
        $('#dis_total').prepend(discount);
        $('#tax_total').prepend(tax);
        $('#t_total').prepend(total_price);
        console.log("total_cost", total_cost);
        console.log("total_discount", total_discount);
        console.log("total_price", total_price);


    });

});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#recved_amnt').on('keyup', function(e) {
        var recved_amnt = $('#recved_amnt').val();
        var total_price = $('#total_price').val();

        var due = parseInt(total_price) - parseInt(recved_amnt);
        $('#due_amt').val(due);
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#saleslist").addClass('active');
});
</script>