<section>
    <!-- to retrieve the review based on the product-id -->
    <input type="hidden" id="product-id" value="<?php echo  $product_id ?>">
    <div id="product-rating">
        <div class="review review-left">
            <h3>Rating and Reviews</h3>
            <h2 id="avg-rating-value"> <span id="avg-rating">(0.0)</span>
                /5</h2>
            <div class="rating-scale">
                <i class="fa-solid fa-star main_star"></i>
                <i class="fa-solid fa-star main_star"></i>
                <i class="fa-solid fa-star main_star"></i>
                <i class="fa-solid fa-star main_star"></i>
                <i class="fa-solid fa-star main_star"></i>
            </div>
            <h4 id="number-of-rating">
                <span id="total_review">0</span> Review
            </h4>

        </div>
        <div class="review review-mid">
            <ul>
                <li class="star-scale-review">
                    <span>5</span>
                    <i class="fa-solid fa-star"></i>
                    <div class="progress">
                        <div class="progress-bar warning-bg" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                    </div>
                    <span id="total_five_star_review">(0)</span>
                </li>
                <li class="star-scale-review">
                    <span>4</span>
                    <i class="fa-solid fa-star"></i>
                    <div class="progress">
                        <div class="progress-bar warning-bg" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                    </div>
                    <span id="total_four_star_review">(0)</span>
                </li>
                <li class="star-scale-review">
                    <span>3</span>
                    <i class="fa-solid fa-star"></i>
                    <div class="progress">
                        <div class="progress-bar warning-bg" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                    </div>
                    <span id="total_three_star_review">(0)</span>
                </li>
                <li class="star-scale-review">
                    <span>2</span>
                    <i class="fa-solid fa-star"></i>
                    <div class="progress">
                        <div class="progress-bar warning-bg" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                    </div>
                    <span id="total_two_star_review">(0)</span>
                </li>
                <li class="star-scale-review">
                    <span>1</span>
                    <i class="fa-solid fa-star"></i>
                    <div class="progress">
                        <div class="progress-bar warning-bg" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                    </div>
                    <span id="total_one_star_review">(0)</span>
                </li>
            </ul>
        </div>
        <div class="review review-right">
            <h3>Write a review</h3>
            <?php
            if (isset($_SESSION['customer_name'])) {
                $customer_id = $_SESSION["login_customer_id"];
                // Checking whether the customer has already reviewed the product
                $check_qry = "SELECT rating FROM product_review WHERE product_id = $product_id AND customer_id = $customer_id";
                $review_set = $connection->query($check_qry);
                $review = $review_set->fetch();

                // A review exists, the customer has already reviewed the product
                if ($review_set->rowCount() > 0) {
                    // A row exists, the customer has already reviewed the product
               ?>
                    <button type="button" id="noti-review-already" class="btn btn-primary">Review</button>
                <?php
                } else {
                    // No row found, the customer has not reviewed the product
                ?>
                    <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                <?php
                }
            } else {
                ?>
                <button type="button" id="ask-login" name="add_review" class="btn btn-primary">Review</button>
            <?php
            }
            ?>

        </div>

    </div>

    <div id="review_content">

    </div>

    <div id="show-btns">
        <button id="view-all-reviews-btn">View all reviews</button>
        <button id="show-less-reviews-btn">Show less</button>
    </div>

</section>
<div id="overlay"></div>
<div id="review-box">
    <h2 class="title">Submit Review</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-review-box">
        <i class="fa-solid fa-circle-xmark"></i>
    </button>

    <form id="review-box-form">
        <div class="rating-scale">
            <input type="radio" name="star" id="star1" class="star-rating" value="5" />
            <label for="star1"></label>
            <input type="radio" name="star" id="star2" class="star-rating" value="4" />
            <label for="star2"></label>
            <input type="radio" name="star" id="star3" class="star-rating" value="3" />
            <label for="star3"></label>
            <input type="radio" name="star" id="star4" class="star-rating" value="2" />
            <label for="star4"></label>
            <input type="radio" name="star" id="star5" class="star-rating" value="1" />
            <label for="star5"></label>
        </div>
        <h4 class="rating-value">5 out of 5</h4>
        <input type="hidden" id="customer_id" value="<?php echo $_SESSION["login_customer_id"] ?>">
        <input type="hidden" id="product_id" value="<?php echo $product_id ?>">

        <textarea name="customer_review" id="customer_review" class="form-control" placeholder="Type Review Here" required></textarea>

        <button type="button" class="btn btn-primary" id="save-review">Submit</button>

    </form>
</div>
</div>

<div id="ask-login-form">
    <div>
        <i class="fa-regular fa-face-laugh-beam smilly-emoji"></i>
        <h2>Please login to your account first. </h2>
    </div>

    <div>
        <form action="./login.php" method="post">
            <input type="hidden" name="current_page" class="current_page">
            <input type="submit" class="information-bg ask-login-btn" name="login-for" value="Login">
        </form>
    </div>
</div>

<div id="noti-review-already-form">
    <div>
        <i class="fa-regular fa-face-laugh-beam pleasure-emoji"></i>
        <p>
            We appreciate your feedback! It seems that you have already provided a review for this product. Thank you for your valuable input and continued support. </p>
    </div>

    <div>
        <button id="close-noti-review-already-box">
            Close
        </button>
    </div>
</div>