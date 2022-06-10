<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/review.class.php')
?>

<?php function drawAddReview(int $id) { ?>
  <section id="addreview">
    <header>
      <p id="myreview">You haven't reviewed this restaurant yet</p>
    </header>
    <form id="reviewform" action="../actions/action_add_review.php?id=<?=$id?>" method="post">
        <p class="reviewer">Add review</p>
        <label for="grade">Grade: </label>
        <input id="grade" type="number" name="grade" placeholder="Choose from 1 to 5" min="1" max="5" required>
        <button form="reviewform" id="reviewbutton" type="submit">Review</button>
    </form>
  </section>
<?php } ?>

<?php function drawUserReview(?Review $review) { ?>
    <p>You have reviewed this restaurant with <?=$review->grade?></p>
<?php } ?>

<?php function drawReviews(array $reviews) { ?>
  <section id="reviews">
    <header>
     <h2 class="rests">Reviews</h2>
    </header>
    <?php if(empty($reviews)): ?>
      <p id="myreview">No reviews for this restaurant</p>
    <?php else: ?>
      <?php foreach($reviews as $review) { ?> 
        <article class="review">
          <img src="<?=$review->userphoto?>">
          <br>
          <p><b>Username: </b><?=$review->username?></p>
          <p><b>Grade: </b><?=$review->grade?></p>
          <p><b>Date: </b><?=$review->date?></p>
        </article>
      <?php } ?>
    <?php endif; ?>
  </section>
<?php } ?>

<?php function drawReviewScore(Restaurant $restaurant) { ?>
  <?php if($restaurant->avgscore == 0): ?>
    <p>No reviews yet</p>
  <?php else: ?>
    <p class="avgscore" id="avgscore<?=$restaurant->id?>"></p>
    <script>
      document.getElementById("avgscore<?=$restaurant->id?>").innerHTML = (Math.round(<?=$restaurant->avgscore?> * 100) / 100).toFixed(1);
    </script>
  <?php endif; ?>
<?php } ?>

<?php function getUserReview(int $id, array $reviews) : ?Review {
    foreach($reviews as $review) {
        if(intval($review->user) === $id)
            return $review;
    }
    return null;
} ?>