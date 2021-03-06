<?php

if (empty($_COOKIE['language'])) {
    die('Invalid Language');
} else {

    require_once __DIR__.'/../locale/'.$_COOKIE['language'].'.php';

    $langData = $data['stats']['withnights'];
echo '<h1 class="text-center">'. $langData['second_title'] .'</h1>';
echo '<br><br>';
echo '<form method="post" action="/" name="form2" id="withnights">';
echo '    <div class="form-row">';
echo '        <div class="col">';
echo '            <fieldset class="border p-5">';
echo '                <legend class="my-auto">';
echo $langData['form']['lengends']['nights'];
echo '                </legend>';
echo '                <div class="form-row">';
echo '                    <div class="col">';
echo '                        <label for="f2_single_nights">'. $langData['form']['labels']['single'] .'</label>';
echo '                        <input type="number" name="single_nights" id="f2_single_nights" class="form-control" placeholder="ex: 30">';
echo '                        <div class="invalid-feedback" id="f2_single_nights_feedback">';
echo '                            <!-- Validation Error msg -->';
echo '                        </div>';
echo '                    </div>';
echo '                    <div class="col">';
echo '                        <label for="f2_dual_nights">'. $langData['form']['labels']['dual'] .'</label>';
echo '                        <input type="number" name="dual_nights" id="f2_dual_nights" class="form-control" placeholder="ex: 30">';
echo '                        <div class="invalid-feedback" id="f2_dual_nights_feedback">';
echo '                            <!-- Validation Error msg -->';
echo '                        </div>';
echo '                    </div>';
echo '                </div>';
echo '                <div class="alert alert-warning alert-dismissible fade show" role="alert">';
echo '                    <strong>'. $langData['alert']['note'] .'</strong> '. $langData['alert']['desc'];
echo '                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
echo '                      <span aria-hidden="true">×</span>';
echo '                    </button>';
echo '                </div>';
echo '            </fieldset>';
echo '        </div>';
echo '    </div>';
echo '';
echo '    <div class="form-row mt-5">';
echo '        <div class="col">';
echo '            <fieldset class="border p-5">';
echo '                <legend class="w-auto">'. $langData['form']['lengends']['food'] .'</legend>';
echo '                <div class="form-row">';
echo '                    <div class="col">';
echo '                        <label for="f2_food_percent">'. $langData['form']['labels']['food'] .'</label>';
echo '                        <div class="input-group">';
echo '                            <input type="number" id="f2_food_percent" name="food_percent" class="form-control" placeholder="ex: 50">';
echo '                            <div class="input-group-append">';
echo '                                <span class="input-group-text">%</span>';
echo '                            </div>';
echo '                            <div id="f2_food_percent_feedback" class="invalid-feedback">';
echo '                                <!-- validation feed back -->';
echo '                            </div>';
echo '                        </div>';
echo '                    </div>';
echo '                    <div class="col">';
echo '                        <label for="f2_drink_percent">'. $langData['form']['labels']['drink'] .'</label>';
echo '                        <div class="input-group">';
echo '                            <input type="number" id="f2_drink_percent" name="drink_percent" class="form-control" placeholder="ex: 50">';
echo '                            <div class="input-group-append">';
echo '                                <span class="input-group-text">%</span>';
echo '                            </div>';
echo '                            <div id="f2_drink_percent_feedback" class="invalid-feedback">';
echo '                                <!-- validation feed back -->';
echo '                            </div>';
echo '                        </div>';
echo '                    </div>';
echo '                </div>';
echo '            </fieldset>';
echo '        </div>';
echo '    </div>';
echo '';
echo '    <div class="form-row mt-2">';
echo '        <div class="col">';
echo '            <label for="f2_host_percent">'. $langData['form']['labels']['host'] .'</label>';
echo '            <div class="input-group">';
echo '                <input type="number" name="host" id="f2_host_percent" class="form-control" placeholder="ex: 30">';
echo '                <div class="input-group-append">';
echo '                    <span class="input-group-text">%</span>';
echo '                </div>';
echo '                <div class="invalid-feedback" id="f2_host_percent_feedback">';
echo '                    <!-- Validation Error msg -->';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '        <div class="col">';
echo '            <label for="f2_date">'. $langData['form']['labels']['date'] .'</label>';
echo '            <input type="date" name="date" id="f2_date" class="form-control">';
echo '            <div class="invalid-feedback" id="f2_date_feedback">';
echo '                <!-- Validation Error msg -->';
echo '            </div>';
echo '        </div>';
echo '    </div>';
echo '    <div class="form-row mt-5">';
echo '        <div class="col">';
echo '            <input type="hidden" name="ajax" value="false">';
echo '            <input type="hidden" name="withnights">';
echo '            <input type="submit" value="'. $langData['form']['submit'] .'" class="form-control" onclick="Form2Validation();">';
echo '        </div>';
echo '    </div>';
echo '</form>';
}
