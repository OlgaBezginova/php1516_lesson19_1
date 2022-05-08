<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 d-flex justify-content-around text-center">
                <h1>Leave a review about... whatever</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <form method="post" action="script.php">
                    <div class="form-group">
                        <label for="name"><strong>Name*</strong></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="">
                    </div>
                    <div class="form-group">
                        <label for="review"><strong>Review*</strong></label>
                        <textarea name="review" class="form-control" id="review" placeholder="Say something" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
