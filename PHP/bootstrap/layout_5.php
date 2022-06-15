<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>bootstrap</title>

    <style>
        .row>.col
        {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            background-color: #f8f9fa;
            border: 1px solid #757575;

        }

        .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9,
        .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9,
        .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9,
        .col-auto
        {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            background-color: #f8f9fa;
            border: 1px solid #757575;
        }        
    </style>
</head>

<body>
    <div class="container">
        <div class="row row-cols-auto">
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
        </div>
        <hr>
        <div class="row row-cols-4">
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col-6">Column</div>
            <div class="col">Column</div>
        </div>
        <hr>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                Level 1: .col-sm-3
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-8 col-sm-6">
                        Level 2: .col-8 .col-sm-6
                    </div>
                    <div class="col-4 col-sm-6">
                        Level 2: .col-4 .col-sm-6
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-9">.col-9</div>
            <div class="col-4">.col-4<br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.</div>
            <div class="col-6">.col-6<br>Subsequent columns continue along the new line.</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
            <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>

            <!-- Force next columns to break to new line -->
            <div class="w-100"></div>

            <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
            <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
            <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>

            <!-- Force next columns to break to new line at md breakpoint and up -->
            <div class="w-100 d-none d-md-block"></div>
            <!-- d-noe : display none이므로 없는 것과 같음, md size가 되면 display block로 만듬 -->

            <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
            <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                First in DOM, no order applied
            </div>
            <div class="col order-5">
                Second in DOM, with a larger order
            </div>
            <div class="col order-1">
                Third in DOM, with an order of 1
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 col-md-6">.col-sm-5 .col-md-6</div>
            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">.col-sm-5 .offset-sm-2 .col-md-6 .offset-md-0</div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-6">.col-sm-6 .col-md-5 .col-lg-6</div>
            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">.col-sm-6 .col-md-5 .offset-md-2 .col-lg-6 .offset-lg-0</div>
        </div>
        <div class="row">
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div>
        </div>
        <div class="row">
            <div class="col-md-3 ms-md-auto">.col-md-3 .ms-md-auto</div>
            <div class="col-md-3 ms-md-auto">.col-md-3 .ms-md-auto</div>
        </div>
        <div class="row">
            <div class="col-auto me-auto">.col-auto .me-auto</div>
            <div class="col-auto">.col-auto</div>
        </div>
    </div>
</body>

</html>