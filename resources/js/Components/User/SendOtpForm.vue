<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <label class="form-label">Email address</label>
                            <input type="email" v-model="form.email" id="email" placeholder="User Email" class="form-control">

                            <br>
                            <button type="submit" class="btn w-100 btn-primary">SEND OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
    import { useForm, router } from '@inertiajs/vue3';
    import { usePage } from '@inertiajs/vue3'

    const props = defineProps({flash : Object})
    const page = usePage()

    const form = useForm({
        email:'',
    })

    function submit(){

        if(form.email.length===0){
            alert("Email Is Required")
        }
        else{
            form.post("/send-otp", {
                onSuccess:()=>{
                    if(page.props.flash.status===true){
                        router.get("/verifyotp")
                    }
                    else{
                        alert(page.props.flash.message)
                    }
                }
            })

        }

    }


</script>

<style scoped>

</style>
