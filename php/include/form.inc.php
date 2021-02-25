<!-- Form file that will be imported on the main php file -->
<div id="app" ng-App="FormApp" ng-Controller="appController">
    <!-- Angular JS element -->
    <nav class="navbar bg-light">
        <div class="custom-nav" id="navbarNav">
            <div class="row">
                <div class="col">
                    <ul class="list-parent">
                        <li>
                            <a ng-class="getClass('/statwithincome')" href="#!/statwithincome" class="nav-link list <?php echo getLangCSSClass($_COOKIE['language']) ?>" id="nav_withincome"><?php echo $data['stats']['withIncome']['title'] ?></a>
                            <a ng-class="getClass('/statwithnights')" class="nav-link list <?php echo getLangCSSClass($_COOKIE['language']) ?>" href="#!statwithnights"><?php echo $data['stats']['withnights']['title'] ?></a>
                            <a class="list list-box"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 mt-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" data-toggle="modal" data-target="#setLanguageModal" onclick="selectSelectedLanguage();"><?php echo $data['stats']['settings']['change_language']['title'] ?></button>
                            <button class="dropdown-item" data-toggle="modal" data-target="#setHotelRooms" onclick="setCurrentHotelRooms();"><?php echo $data['stats']['settings']['change_hotel_rooms']['title'] ?></button>
                            <button class="dropdown-item" data-toggle="modal" data-target="#setRoomsPrice" onclick="setCurrentSingleDualValues();"><?php echo $data['stats']['settings']['change_room_prices']['title'] ?></button>
                            <hr>
                            <a href="mailto:alibenamor30@gmail.com" class="dropdown-item"><?php echo $data['stats']['settings']['report_bug'] ?></a>
                            <hr>
                            <button class="dropdown-item" data-toggle="modal" data-target="#aboutModal"><?php echo $data['stats']['settings']['about']['title'] ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <h1 class="text-center mb-5"><?php echo $data['stats']['fill'] ?></h1>
        <div class="view-animate-container">
            <!-- Angular js router -->
            <div ng-view class="view-animate"></div>
        </div>
    </div>
</div>

<!-- Modals -->

<!-- About -->

<div class="modal fade" id="aboutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['stats']['settings']['about']['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body overflow-hidden">
                <div class="credit-wrapper">
                    <div class="line">
                    <?php echo $data['stats']['settings']['about']['desc']['line_one'] ?>
                    </div>
                    <div class="line">
                    <?php echo $data['stats']['settings']['about']['desc']['line_two'] ?>
                    </div>
                    <div class="line">
                    <?php echo $data['stats']['settings']['about']['desc']['line_three'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Set Language -->

<div class="modal fade" id="setLanguageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['stats']['settings']['change_language']['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="setLanguage">
                    <div class="form-row">
                        <div class="col">
                            <label for="setLanguage"><?php echo $data['stats']['settings']['change_language']['select']['title'] ?></label>
                            <select name="setLanguage" id="setLanguage" class="form-control">
                                <option value="en"><?php echo $data['stats']['settings']['change_language']['select']['option']['en'] ?></option>
                                <option value="fr"><?php echo $data['stats']['settings']['change_language']['select']['option']['fr'] ?></option>
                                <option value="ar"><?php echo $data['stats']['settings']['change_language']['select']['option']['ar'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col">
                            <button type="button" class="btn btn-outline-success btn-block" id="setLanguageButton"><?php echo $data['stats']['settings']['continue'] ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Set Hotel Rooms -->

<div class="modal fade" id="setHotelRooms" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['stats']['settings']['change_hotel_rooms']['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col">
                            <label for="hotelRooms"><?php echo $data['stats']['settings']['change_hotel_rooms']['label'] ?></label>
                            <input type="number" name="hotelRooms" id="hotelRooms" class="form-control" placeholder="<?php echo $data['stats']['settings']['change_hotel_rooms']['placeholder'] ?>">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col">
                            <button type="button" class="btn btn-outline-success btn-block" id="setHotelRoomsBtn"><?php echo $data['stats']['settings']['continue'] ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Set Rooms price -->

<div class="modal fade" id="setRoomsPrice" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['stats']['settings']['change_room_prices']['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col">
                            <fieldset class="border p-5">
                                <legend class="myauto"><?php echo $data['stats']['settings']['change_room_prices']['legend'] ?></legend>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="hotelRooms"><?php echo $data['stats']['settings']['change_room_prices']['single'] ?></label>
                                        <input type="number" name="single" id="singleRoom" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="hotelRooms"><?php echo $data['stats']['settings']['change_room_prices']['dual'] ?></label>
                                        <input type="number" name="dual" id="dualRoom" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-success btn-block" id="setRoomsPricesBtn"><?php echo $data['stats']['settings']['continue'] ?></button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>