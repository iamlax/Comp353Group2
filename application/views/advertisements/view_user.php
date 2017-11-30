<div class="submit-ad main-grid-border">
    <div class="container">
        <?php if ($isowner) { ?>
        <h2 class="head">Your Ads</h2>
        <?php } else { ?>
        <h2 class="head"><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?>'s Ads</h2>
        <?php } ?>
        <?php foreach ($advertisements as $ad) { ?>
            <div>
                <a href="<?php echo base_url();?>advertisements/<?php echo $ad['adId'] ?>">View Details</a></br>
                Title: <?php echo $ad['title'] ?></br>
                <?php if ($ad['promoId'] > 0) { ?>
                    <span class="label label-warning">Promoted</span></br>
                <?php } ?>
                Rank in <?php echo $ad['cat_name'] ?>/<?php echo $ad['sub_name'] ?> in <?php echo $ad['city'] ?>: <span class="label label-primary"><?php echo $ad['rank'] ?></span></br>
                Description: <?php echo $ad['description'] ?></br>
                Date: <?php echo $ad['date'] ?></br>
                Address: <?php echo $ad['address'] ?></br>
                Availability: <?php echo $ad['availability'] ?></br>
                StoreId: <?php echo $ad['storeId']; ?></br>
                Rating: <?php echo $ad['rating'] ?></br>
                Email:<?php echo $ad['email'] ?></br>
                Phone: <?php echo $ad['phone'] ?></br>
                For Sale By: <?php echo $ad['forSaleBy'] ?></br>
                <?php if ($isowner) { ?>
                Status: <?php echo $ad['status'] ?></br>
                <a href="<?php echo base_url();?>advertisements/edit/<?php echo $ad['adId'] ?>"><button type="button" class="btn-warning">Edit</button></a>
                <a href="<?php echo base_url();?>advertisements/delete/<?php echo $ad['adId'] ?>"><button type="button" class="btn-danger">Delete</button></a>
                <?php } ?>
            </div>
            </br>
            </br>
        <?php } ?>
    </div>	
</div>