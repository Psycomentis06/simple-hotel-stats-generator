<?php
/**
 * Treat data for this form
 */
if (!empty($_POST['first'])) {
    // submitted

    // form errors array
    $errors = [];
    $values = [];

    if (!empty($_POST['language'])) {
        setcookie('language', $_POST['language']);
        $values['language'] =  $_POST['language'];
    }else if (empty($_POST['language']) and empty($_COOKIE['language'])) {
        // set it english by default
        setcookie('language', 'en');
        $values['language'] = 'en';
    }
    // single
    if (!empty($_POST['single_room_price'])) {
        $values['single'] = $_POST['single_room_price'];
        setcookie('single', $_POST['single_room_price']);
    } else {
        $errors['single'] = $data['first_time']['errors']['single_required'];
    }
    // dual
    if (!empty($_POST['dual_room_price'])) {
        $values['dual'] = $_POST['dual_room_price'];
        setcookie('dual', $_POST['dual_room_price']);
    } else {
        $errors['dual'] = $data['first_time']['errors']['dual_required'];
    }

    // rooms number validation

    if (!empty($_POST['rooms_number'])) {
        // check for rooms number
        if ($_POST['rooms_number'] < 20 or $_POST['rooms_number'] > 100) {
            $errors['rooms_number'] = $data['first_time']['errors']['rooms_interval'];
        } else {
            $values['rooms'] = $_POST['rooms_number'];
            setcookie('room_number', $_POST['rooms_number']);
        }
    } else {
        // empty
        $errors['rooms_number'] = $data['first_time']['errors']['rooms_required'];;
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['values'] = $values;

    if (count($errors) == 0) {
        header("Refresh:0");
    }
}
?>

<div class="first-step">
    <div class="jumbotron">
    <h2 class="text-dark text-center">
        <!--Hello it looks like this is your first time Let's set somethings up before we start ?!-->
        <?php echo $data['first_time']['greeting']?>
    </h2>
    <hr>
    <form method="post">
        <div class="row mt5">
            <div class="col">
                <fieldset class="border p-5">
                    <legend class="w-auto">
                        <!--Room Prices-->
                        <?php echo $data['first_time']['room_price']?>
                    </legend>
                    <div class="row">
                        <div class="col-6">
                            <input type="number" name="single_room_price" class="form-control" placeholder="<?php echo $data['first_time']['placeholder']['single']?>" value="<?php if (!empty($_SESSION['values']['single'])) echo $_SESSION['values']['single']; ?>">
                            <?php
                            // form error
                            if ( !empty($_SESSION['errors']['single']) and isset($_POST['first'])) {
                                ?>
                                <span><div class="badge badge-pill badge-danger">Danger</div> <div
                                        class="text-danger">
                                            <?php
                                            echo $_SESSION['errors']['single'];
                                            ?>
                                        </div></span>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-6">
                            <input type="number" name="dual_room_price" class="form-control" placeholder="<?php echo $data['first_time']['placeholder']['dual']?>" value="<?php if (!empty($_SESSION['values']['dual'])) echo $_SESSION['values']['dual']; ?>">
                            <?php
                                // form error
                                if ( !empty($_SESSION['errors']['dual'])  and isset($_POST['first'])) {
                                    ?>
                                    <span><div class="badge badge-pill badge-danger">Danger</div> <div
                                            class="text-danger">
                                            <?php
                                                echo $_SESSION['errors']['dual'];
                                            ?>
                                        </div></span>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <fieldset class="border p-5">
                    <legend class="w-auto">
                        <!--Hotel Rooms-->
                        <?php echo $data['first_time']['hotel_rooms']?>
                    </legend>
                    <input type="number" class="form-control" name="rooms_number" placeholder="<?php echo $data['first_time']['placeholder']['rooms']?>" value="<?php if (!empty($_SESSION['values']['rooms'])) echo $_SESSION['values']['rooms']; ?>">
                    <?php
                    // form error
                    if ( !empty($_SESSION['errors']['rooms_number'])  and isset($_POST['first'])) {
                        ?>
                        <span><div class="badge badge-pill badge-danger">Danger</div> <div
                                class="text-danger">
                                            <?php
                                            echo $_SESSION['errors']['rooms_number'];
                                            ?>
                                        </div></span>
                        <?php
                    }
                    ?>
                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <fieldset class="border p-5">
                    <legend class="w-auto">
                        <!--Language-->
                        <?php echo $data['first_time']['language']?>
                    </legend>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Language</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="language">
                            <option <?php if (empty($_SESSION['values'])) echo 'selected'; ?> value="" disabled><?php echo $data['first_time']['placeholder']['language']['choose']?> </option>
                            <option <?php if (!empty($_SESSION['values']['language']) == 'en') echo 'selected'; ?>  value="en"><?php echo $data['first_time']['placeholder']['language']['en']?></option>
                            <option <?php if (!empty($_SESSION['values']['language']) == 'fr') echo 'selected'; ?> value="fr"><?php echo $data['first_time']['placeholder']['language']['fr']?></option>
                            <option <?php if (!empty($_SESSION['values']['language']) == 'ar') echo 'selected'; ?> value="ar"><?php echo $data['first_time']['placeholder']['language']['ar']?></option>
                        </select>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <input type="submit" value="<?php echo $data['first_time']['submit']?>" class="form-control" name="first">
        </div>
    </form>

   </div>
</div>

<div class="row mt-6 mb-5">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Note</h4>
        <p>Those options are changeable you can change every one of them after this so don't hesitate to pick what you want now</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to click on the top settings link to change.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>