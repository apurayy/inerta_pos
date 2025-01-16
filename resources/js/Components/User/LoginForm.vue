<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <h4 class="text-center text-primary">SIGN IN</h4>
                            <br>
                            <input type="email" v-model="form.email" id="email" placeholder="User Email" class="form-control">

                            <br>
                            <input type="password" v-model="form.password" id="password" placeholder="User Password" class="form-control">

                            <br>
                            <button type="submit" class="btn w-100 btn-primary">Login</button>
                            <hr>
                            <span>
                                <Link class="text-center ms-3 h6" href="/registration">Sign-Up </Link>
                                <span class="ms-1"> |</span>
                                <Link class="text-center ms-3 h6" href="/sendotp">Forget Password</Link>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { Link, useForm, router } from '@inertiajs/vue3';
    import { usePage } from '@inertiajs/vue3'

    const props = defineProps({flash : Object})
    const page = usePage()

    const form = useForm({
        email:'',
        password:'',
    })

    function submit(){

        if(form.email.length===0){
            alert("Email Is Required")
        }
        else if(form.password.length===0){
            alert("Password Is Required")
        }
        else{
            form.post("/user-login", {
                onSuccess:()=>{
                    if(page.props.flash.status===true){
                        router.get("/dashboard")
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
