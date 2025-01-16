<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <div class="card-body">
                        <h4 class="text-center text-primary">Sign Up</h4>
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" v-model="form.name" class="form-control" id="name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" v-model="form.email" class="form-control" id="email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" v-model="form.mobile" class="form-control" id="mobile">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" v-model="form.password" class="form-control" id="password">
                            </div>


                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        </form>
                    </div>
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
        name:'',
        email:'',
        mobile:'',
        password:'',
    })

    function submit(){

        if(form.name.length===0){
            alert("Name Is Required")
        }
        else if(form.email.length===0){
            alert("Email Is Required")
        }
        else if(form.mobile.length===0){
            alert("Mobile Is Required")
        }
        else if(form.password.length===0){
            alert("Password Is Required")
        }
        else{
            form.post("/user-registration", {
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
