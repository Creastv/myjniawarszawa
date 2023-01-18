    <div class="tabs-cennik">
			<div class="row">
                <?php if( have_rows('rodzaj_samochodu') ): $i = 1; ?>
                    <ul class="nav nav-tab"  >
                    <?php while( have_rows('rodzaj_samochodu') ): the_row(); 
                        $image = get_sub_field('zdjecie');
                        $tytul = get_sub_field('tytul');
                        $des = get_sub_field('dopisek');
                        $href = id_boost($tytul);
                        ?>
                        <li class="nav-item" >
                            <a href="#tab_<?php echo $href; ?>" class="<?php if($i == 1) echo 'active';?>"  data-toggle="tab">
                                <div class="car">
                                    <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
                                    <h4><?php echo $tytul; ?></h4>
                                    <p><?php echo $des; ?></p>
                                    </div>
                            </a>
                        </li>
                    <?php $i++; endwhile;  ?>
                    </ul>

                    <div class="tab-content">
                        <?php  $i = 1; while( have_rows('rodzaj_samochodu') ): the_row(); 
                            $image = get_sub_field('zdjecie');
                            $tytul = get_sub_field('tytul');
                            $des = get_sub_field('dopisek');
                            $href = id_boost($tytul);
                        ?>
                           <div id="tab_<?php echo $href; ?>" class="tab-pane fade <?php if($i == 1) echo 'active show';?>" role="tabpanel" >
                            
                            <?php if( have_rows('pakiet') ):
                            $count = 0;
                            $group = 0;
                            ?>
                            <div class="pakiety">
                                <?php while( have_rows('pakiet') ): the_row(); $p++; 
                                    $wyr = get_sub_field('wyrozniony');
                                    $nazwa = get_sub_field('nazwa_');
                                    $cena = get_sub_field('cena');
                                    $lista = get_sub_field('lista');
                                    $time = get_sub_field('czas_trwania_uslugi');
                                    $url = get_sub_field('link');
                                    $butText = get_sub_field('tresc_linka');
								    $urldes = get_sub_field('link_des');
                                    ?>
<!--                                    <?php  if (  $count < 1  ) { ?>
                                    <div class="col pakiet-marge">
                                    <?php } ?> -->
                                        <div class="col pakiet">
                                            <div class="wraper">
                                                <?php if( $wyr == true) { ?>
                                                    <span class="top">top</span>
                                                <?php } ?>
                                                <h3><?php echo $nazwa; ?></h3>
                                                <p><?php echo $cena; ?></p>

                                                <?php if( have_rows('lista') ): ?>
                                                    <ul class="wcenie">
                                                    <?php while( have_rows('lista') ): the_row(); 
                                                        $punkt = get_sub_field('punkt');
                                                        ?>
                                                        <li>
                                                            <p><i class="fas fa-check"></i> <?php echo $punkt; ?></p>
                                                        </li>
                                                    <?php endwhile; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if( !empty($time)) { ?>
                                                <span class="time"><i class="far fa-clock"></i> <?php echo $time; ?> </span>
                                                <?php } ?>
												<?php if(isMobile()){ ?>
													<?php if( !empty($url && $butText) ) { ?>
													<div class="text-center">
														<a class="btn btn-main " href="<?php echo $url; ?>"> <?php echo $butText; ?> <i class="fas fa-chevron-right"></i></a>
													</div>
													<?php } ?>
												<?php } else { ?>
													 <?php if( !empty($urldes && $butText) ) { ?>
													<div class="text-center">
														<a class="btn btn-main " href="<?php echo $urldes; ?>"> <?php echo $butText; ?> <i class="fas fa-chevron-right"></i></a>
													</div>
													<?php } ?>
												<?php } ?>
                                            </div>
                                        </div>
<!--                                     <?php  if (  $count == 1  ) { ?>
                                    </div>
                                    <?php } ?> -->
                             
                                <?php $count++; endwhile; ?>
                            </div>
                            <?php endif; wp_reset_query();?>
                           </div>
                                    
                        <?php  $i++; endwhile; ?>
                    </div>
            
                <?php endif; wp_reset_query(); ?>
            </div>
	</div>
                                   