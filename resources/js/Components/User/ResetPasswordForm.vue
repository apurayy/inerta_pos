<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <h4 class="text-center text-primary">Set Password</h4>

                            <br>
                            <input type="password" v-model="form.password" id="password" placeholder="New Password" class="form-control">

                            <br>
                            <input type="password" v-model="form.cpassword" id="cpassword" placeholder="Confirm Password" class="form-control">

                            <br>
                            <button type="submit" class="btn w-100 btn-primary">Update Password</button>

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
        password:'',
        cpassword:'',
    })

    function submit(){

        if(form.password.length===0){
            alert("Password Is Required")
        }
        else if(form.cpassword.length===0){
            alert("Confirme Password Is Required")
        }
        else if(form.password!==form.cpassword){
            alert("Password Is Invalid")
        }
        else{
            form.post("/reset-password", {
                onSuccess:()=>{
                    if(page.props.flash.status===true){
                        router.get("/login")
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
