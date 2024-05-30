<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/font-size.css') }}">
</head>
<style>
    /* .border-1-red {
  border: 1px solid red;
} */

    /* Active, focus, hover styles */
    .form-control.border-1-red:focus,
    .form-control.border-1-red:hover,
    .form-control.border-1-red:active,
    .form-control.border-1-red.active {
        border-color: none;
    }

    /* Dropdown background color */
    .dropdown-menu.show {
        background-color: white;
    }

    /* Background color on hover, focus, click */
    .dropdown-menu.show .dropdown-item:focus,
    .dropdown-menu.show .dropdown-item:hover,
    .dropdown-menu.show .dropdown-item.active {
        background-color: inherit;
    }

    /* Review Order button style */
    .btn-review-order {
        background: red;
        border: 1px solid red;
        border-radius: 20px;
        color: white;
        padding-left:5%;
         padding-right:5%
    }

    .btn-review-order:hover {
        background: rgb(156, 8, 8);
        border: 1px solid rgb(156, 8, 8);
        border-radius: 20px;
        color: white;
        padding-left:5%;
         padding-right:5%
    }

    .form-control:focus {
        outline: 0;
        box-shadow: none;
    }
    .btn-login{

        background-color: red;
         color: white; 
border-radius:20px;
         border:1px solid red;
         padding-left:2%;
         padding-right:2%
    }

    .btn-login:hover{

background-color: rgb(156, 8, 8);
 color: white; 
border-radius:20px;
 border:1px solid rgb(156, 8, 8);
 padding-left:2%;
 padding-right:2%
}


    body{
       background:  #e6e4e4;
    }
</style>

<body>


    <div class="container mb-4">
        <div class="card w-100 p-4 mt-4">
            <p class="paragraph">To track your order, review shipments, or communicate with marketplace vendors, please
                enter the email address, order number, and country (or region) associated with the order.</p>

            <div class="card p-4" style="background:#c4c4c4;">

                <div class="row">
                    <div class="col-md-3">
                        <label for="copylimit-email" class="paragraph">Order Number</label>
                        <input type="text" class="form-control input-text w-100" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="copylimit-order" class="paragraph">Email</label>
                        <input type="text" class="form-control input-text w-100" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="country" class="paragraph">Country/Region:</label>
                            <div class="input-group">
                                <select class="form-control border-1-red" id="country" name="country">
                                    <option value="#">select</option>
                                    <option value="usa" class="small-paragraph">USA</option>
                                    <option value="canada" class="small-paragraph">Canada</option>
                                    <option value="uk" class="small-paragraph">UK</option>
                                    <!-- Add more options as needed -->
                                </select>
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center ">
                        <button type="button " class="btn btn-sm btn-review-order paragraph">Review Order</button>
                    </div>
                </div>


            </div>
        </div>


<div class="card mt-4 p-4">
    <p class="heading">A Benefit For myDIGIKEY Users</p>
    <p class="paragraph">If you do not have your order information handy, registered users visit Order History  to check an order status and access invoices.</p>
    <div class="div">
    <button type="button" class="btn btn-sm btn-login">Login</button>
</div>

</div>



    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
