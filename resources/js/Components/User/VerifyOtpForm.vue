<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <label class="form-label">4 Digit Code Here</label>
                            <input type="text" v-model="form.otp" id="otp" placeholder="Code" class="form-control">

                            <br>
                            <button type="submit" class="btn w-100 btn-primary">Verify OTP</button>
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
        otp:'',
    })

    function submit(){

        if(form.otp.length===0){
            alert("OTP Is Required")
        }
        else{
            form.post("/verify-otp", {
                onSuccess:()=>{
                    if(page.props.flash.status===true){
                        router.get("/resetpassword")
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
