<!-- container -->
<section>
    <div class="row">
        <!-- perfil -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'profile/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="<?= empty($profile['IMAGE_PROFILE'])?($profile['SEX_PERSON']?'img/system/user_man.png':'img/system/user_woman.png'):$profile['IMAGE_PROFILE']; ?>" alt="<?= $profile['NAME_PERSON'] ?>"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info"><b><?= $profile['NAME_PERSON'] ?></b></p>
                </div>
            </a>
        </div>
        <!-- mensajes -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'messages/'?>'" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_message.png"
                         alt="Mensajes" title="Bandeja de mensajes"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Bandeja de mensajes</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- historial -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'history/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_history.jpg"
                         alt="Historial" class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Historial</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- chat -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'chat/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_chat.png" alt="Convesaciones por chat"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Chat</b>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- calendario de actividades -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'activity/calendar/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_calendar.jpg" alt="Calendario de actividades"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Calendario de actividades</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- about -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'help/about/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_about.jpg" alt="Acerca de nosotros" title="Acerca de nosotros11"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Acerca de nosotros</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- preguntas frecuentes -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'frequently/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_question.png" alt="Preguntas frecuentes" title="Preguntas frecuentes"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Preguntas frecuentes</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- menu de alimentos -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'food/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_menu_food.jpg" alt="Menu" title="Menu de comidas"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Menu de alimentos</b>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- lugares turisticos -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'site/'?>" class="app-underline">
	            <div class="thumbnail alert">
                    <img src="img/system/ic_site_tour.png" alt="Lugar turistico" title="Lugares turisticos"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Lugares túristicos</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- reservas insert-->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'reserve/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_reserve_insert.jpg"
                         alt="Reserva" title="Insertar reserva"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Insertar reserva</b>
                    </p>
                </div>
            </a>
        </div>
        <!-- servicios -->
        <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
            <a href="<?= 'service/'?>" class="app-underline">
                <div class="thumbnail alert">
                    <img src="img/system/ic_service.jpg" alt="Servicios" title="Servicios"
                         class="img-circle app-profile-user eldiv shrink">
                    <p class="text-center text-info">
                        <b>Servicios</b>
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
