<template>
    <div :class="'bg-main-blue p-3 form-consulting-field '+getFullRound()">
        <div class="form-consulting-header">
            <span class="form-consulting-title py-3 text-wrap">Consulta sin compromiso</span>
        </div>
        <div class="form-group col-12 my-2">
            <label class="text-white">Nombre y Apellido</label>
            <div class="form-group has-search d-flex align-items-center">
                <span class="fas fa-user form-control-feedback text-white"></span>
                <input v-model="fullName" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
            </div>
        </div>
        <div class="form-group col-12 my-2">
            <label class="text-white">Correo electrónico</label>
            <div class="form-group has-search d-flex align-items-center">
                <span class="fas fa-mail-bulk form-control-feedback text-white"></span>
                <input v-model="email" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
            </div>
        </div>
        <div class="form-group col-12 my-2">
            <label class="text-white">Nro de Teléfono</label>
            <div class="form-group has-search d-flex align-items-center">
                <span class="fas fa-phone form-control-feedback text-white"></span>
                <input v-model="phone" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
            </div>
        </div>
        <div class="col-12 my-2 d-flex justify-content-center align-items-center">
            <!--
                <vue-recaptcha @error="onCaptchaError" @expired="onCaptchaExpired" @verify="verifyCaptcha" class="col-12 v-captcha" :sitekey="reCaptchaKey" :loadRecaptchaScript="true" ></vue-recaptcha>
            -->
        </div>
        <div class="col-12 my-2 p-3 mx-auto" >
            <button :disabled="disableButton" @click="sendMail" class="btn btn-block btn-dark-blue rounded-pill">
                CONSULTAR
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props:["offer"],

    data(){
        return {
            fullName:"",
            email:"",
            phone:"",
            baseUrl:baseUrl,
            disableButton:false,
            captcha:"",
        }
    },

    methods:{
        /*
        verifyCaptcha(captcha){
            this.captcha=captcha;
        },

        onCaptchaError(err){
            console.log("error captcha ", err)
            toastr.error("error en la validación del captcha, comprueba tu conexión a internet e intenta nuevamente")
        },

        onCaptchaExpired(err){
            console.log("error captcha ", err)
            toastr.error("el captcha se expiró, intente nuevamente")
        },*/

        getFullRound(){
            if(!this.offer) return "consult-card-full-rounded";
            else return "col-lg-5 col-xl-5 col-12";
        },
        sendMail(){

            let fd= new FormData();

            if(this.fullName&&this.fullName!="") fd.append("fullName", this.fullName);
            else return toastr.error("Rellene todos los campos");
            if(this.email&&this.email!="") fd.append("email", this.email);
            else return toastr.error("Rellene todos los campos");
            if(this.phone&&this.phone!="") fd.append("phone", this.phone);
            else return toastr.error("Rellene todos los campos");

            //if(this.captcha&&this.captcha!="") fd.append("g-recaptcha-response", this.captcha);
            //else return toastr.error("Complete la prueba de captcha");

            if(this.offer){
                fd.append("offer", this.offer.id)
                fd.append("type", "offer")
                fd.append("company_name", this.offer.company_name)
                fd.append("service_name", this.offer.service_name)
                if(this.offer.department) fd.append("department", this.offer.department_name)
                if(this.offer.municipality) fd.append("municipality", this.offer.municipality_name)
            }

            fd.append("type", this.offer?"offer":"general");

            this.disableButton= true;

            let loader = this.$loading.show();

            axios.post(baseUrl+"/api/mail/contact", fd)
            .then(res=>{
                console.log("server response ",res);
                toastr.success("Datos enviados exitosamente");
            }).catch(err=>{
                console.log("server error ",err.response);
                toastr.error("Error al enviar los datos, intente nuevamente");
            })
            .finally(()=>{
                this.disableButton=false;
                loader.hide()
            });
        }
    },

    computed:{

        reCaptchaKey: {
            get(){
                return window.reCaptchaKey;
            }
        },

    }
}
</script>

<style>

.v-captcha{
    transform: scale(0.7);
    -webkit-transform: scale(0.7);
    transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
}

@media (max-width:350px) {
    .v-captcha{
        transform: scale(0.6);
        -webkit-transform: scale(0.6);
    }
}

</style>
