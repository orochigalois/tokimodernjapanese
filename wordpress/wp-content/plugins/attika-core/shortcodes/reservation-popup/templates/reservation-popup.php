<div class="mkdf-reservation-popup-holder">
    <div class="mkdf-reservation-popup-shader"></div>
    <div class="mkdf-popup-table">
        <div class="mkdf-popup-table-cell">
            <div class="mkdf-popup-inner">
                <div class="mkdf-rf-holder">
                    <?php if($open_table_id !== '') : ?>
                        <form class="mkdf-rf" target="_blank" action="http://www.opentable.com/restaurant-search.aspx" name="mkdf-rf">
                            <div class="mkdf-rf-row clearfix">
                                <div class="mkdf-rf-col-holder">
                                    <h5 class="mkdf-rf-title"><?php esc_html_e('Reservations', 'attika-core'); ?></h5>
                                </div>
                                <div class="mkdf-rf-col-holder">
                                    <div class="mkdf-rf-field-holder clearfix">
                                        <select name="partySize" class="mkdf-ot-people">
                                            <option value="1"><?php esc_html_e('1 Person', 'attika-core'); ?></option>
                                            <option value="2"><?php esc_html_e('2 People', 'attika-core'); ?></option>
                                            <option value="3"><?php esc_html_e('3 People', 'attika-core'); ?></option>
                                            <option value="4"><?php esc_html_e('4 People', 'attika-core'); ?></option>
                                            <option value="5"><?php esc_html_e('5 People', 'attika-core'); ?></option>
                                            <option value="6"><?php esc_html_e('6 People', 'attika-core'); ?></option>
                                            <option value="7"><?php esc_html_e('7 People', 'attika-core'); ?></option>
                                            <option value="8"><?php esc_html_e('8 People', 'attika-core'); ?></option>
                                            <option value="9"><?php esc_html_e('9 People', 'attika-core'); ?></option>
                                            <option value="10"><?php esc_html_e('10 People', 'attika-core'); ?></option>
                                        </select>
                                        <span class="mkdf-rf-icon">
						                    <span class="icon_group"></span>
					                    </span>
                                    </div>
                                </div>
                                <div class="mkdf-rf-col-holder">
                                    <div class="mkdf-rf-field-holder clearfix">
                                        <input type="text" value="<?php echo date('m/d/Y'); ?>" class="mkdf-ot-date" name="startDate">
                                        <span class="mkdf-rf-icon">
						                    <span class="icon_calendar"></span>
					                    </span>
                                    </div>
                                </div>
                                <div class="mkdf-rf-col-holder mkdf-rf-time-col">
                                    <div class="mkdf-rf-field-holder clearfix">
                                        <select name="ResTime" class="mkdf-ot-time">
                                            <option value="6:30am"><?php esc_html_e('6:30 am','attika-core'); ?></option>
                                            <option value="7:00am"><?php esc_html_e('7:00 am','attika-core'); ?></option>
                                            <option value="7:30am"><?php esc_html_e('7:30 am','attika-core'); ?></option>
                                            <option value="8:00am"><?php esc_html_e('8:00 am','attika-core'); ?></option>
                                            <option value="8:30am"><?php esc_html_e('8:30 am','attika-core'); ?></option>
                                            <option value="9:00am"><?php esc_html_e('9:00 am','attika-core'); ?></option>
                                            <option value="9:30am"><?php esc_html_e('9:30 am','attika-core'); ?></option>
                                            <option value="10:00am"><?php esc_html_e('10:00 am','attika-core'); ?></option>
                                            <option value="10:30am"><?php esc_html_e('10:30 am','attika-core'); ?></option>
                                            <option value="11:00am"><?php esc_html_e('11:00 am','attika-core'); ?></option>
                                            <option value="11:30am"><?php esc_html_e('11:30 am','attika-core'); ?></option>
                                            <option value="12:00pm"><?php esc_html_e('12:00 pm','attika-core'); ?></option>
                                            <option value="12:30pm"><?php esc_html_e('12:30 pm','attika-core'); ?></option>
                                            <option value="1:00pm"><?php esc_html_e('1:00 pm','attika-core'); ?></option>
                                            <option value="1:30pm"><?php esc_html_e('1:30 pm','attika-core'); ?></option>
                                            <option value="2:00pm"><?php esc_html_e('2:00 pm','attika-core'); ?></option>
                                            <option value="2:30pm"><?php esc_html_e('2:30 pm','attika-core'); ?></option>
                                            <option value="3:00pm"><?php esc_html_e('3:00 pm','attika-core'); ?></option>
                                            <option value="3:30pm"><?php esc_html_e('3:30 pm','attika-core'); ?></option>
                                            <option value="4:00pm"><?php esc_html_e('4:00 pm','attika-core'); ?></option>
                                            <option value="4:30pm"><?php esc_html_e('4:30 pm','attika-core'); ?></option>
                                            <option value="5:00pm"><?php esc_html_e('5:00 pm','attika-core'); ?></option>
                                            <option value="5:30pm"><?php esc_html_e('5:30 pm','attika-core'); ?></option>
                                            <option value="6:00pm"><?php esc_html_e('6:00 pm','attika-core'); ?></option>
                                            <option value="6:30pm"><?php esc_html_e('6:30 pm','attika-core'); ?></option>
                                            <option value="7:00pm" selected="selected"><?php esc_html_e('7:00 pm','attika-core'); ?></option>
                                            <option value="7:30pm"><?php esc_html_e('7:30 pm','attika-core'); ?></option>
                                            <option value="8:00pm"><?php esc_html_e('8:00 pm','attika-core'); ?></option>
                                            <option value="8:30pm"><?php esc_html_e('8:30 pm','attika-core'); ?></option>
                                            <option value="9:00pm"><?php esc_html_e('9:00 pm','attika-core'); ?></option>
                                            <option value="9:30pm"><?php esc_html_e('9:30 pm','attika-core'); ?></option>
                                            <option value="10:00pm"><?php esc_html_e('10:00 pm','attika-core'); ?></option>
                                            <option value="10:30pm"><?php esc_html_e('10:30 pm','attika-core'); ?></option>
                                            <option value="11:00pm"><?php esc_html_e('11:00 pm','attika-core'); ?></option>
                                            <option value="11:30pm"><?php esc_html_e('11:30 pm','attika-core'); ?></option>
                                        </select>
                                            <span class="mkdf-rf-icon">
						                        <span class="icon_clock"></span>
					                        </span>
                                    </div>
                                </div>
                                <div class="mkdf-rf-col-holder mkdf-rf-btn-holder">
                                    <?php echo attika_mikado_execute_shortcode('mkdf_button',
                                        array(
                                            'type' => 'simple',
                                            'text' =>__('Book a Table', 'attika-core'),
                                            'html_type' => 'button'
                                        )
                                    ) ?>
                                </div>
                            </div>
                            <input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr($open_table_id); ?>">
                            <input type="hidden" name="rid" class="rid" value="<?php echo esc_attr($open_table_id); ?>">
                            <input type="hidden" name="GeoID" class="GeoID" value="15">
                            <input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
                            <input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($open_table_id); ?>">
                        </form>
                        <p class="mkdf-rf-copyright"><?php esc_html_e('Powered by OpenTable', 'attika-core'); ?></p>
                    <?php else: ?>
                        <p><?php esc_html_e('You haven\'t added OpenTable ID', 'attika-core'); ?></p>
                    <?php endif; ?>
                </div>
                <a class="mkdf-reservation-popup-close" href="javascript:void(0)"><span class="lnr lnr-cross"></span></a>
            </div>
        </div>
    </div>
</div>