<?php
$name = '';
$review = '';
$name_msg = '';
$review_msg = '';
$success_msg = '';

$required_text = '<div class="alert alert-danger" role="alert">
                        The field <strong>%s</strong> is required!
                     </div>';
$success_text = '<div class="alert alert-success" role="alert" style="display: flex; justify-content: space-between">
                    <div>Thanks for the review!</div>
                    <a href="javascript:void(0)" class="alert-link" onclick="this.closest(\'.alert-success\').style.display = \'none\'">X</a>
                 </div>';

define('DB_HOST', 'a_level_nix_mysql');
define('DB_USER', 'root');
define('DB_PASSWORD', 'cbece_gead-cebfa');
define('DB_NAME', 'a_level_nix_mysql');

/**
 * @return mysqli
 */
function connect()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die();
    }

    return $connection;
}


/**
 * @param string $name
 * @param string $review
 * @return void
 */
function addReview($name, $review)
{
    $name  = htmlspecialchars(trim(strip_tags($name)));
    $review = htmlspecialchars(trim(strip_tags($review)));

    if (empty($name) || empty($review)) {
        return;
    }

    $mysql = connect();
    $query = sprintf('INSERT INTO reviews (`name`, `review`) VALUES (\'%s\', \'%s\')', $name, $review);

    mysqli_query($mysql, $query);

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success = true;

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name_msg = sprintf($required_text, 'Name');
        $success = false;
    }

    if (isset($_POST['review']) && !empty($_POST['review'])) {
        $review = $_POST['review'];
    } else {
        $review_msg = sprintf($required_text, 'Review');
        $success = false;
    }

    if ($success) {
        addReview($_POST['name'], $_POST['review']);
        $success_msg = $success_text;
    }

    $data = array(
        'success' => $success,
        'name' => $name,
        'review' => $review,
        'name_msg' => $name_msg,
        'review_msg' => $review_msg,
        'success_msg' => $success_msg,
    );

    echo json_encode($data);
}
