<template>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Product</h4>
                            <h5>{{ page.props.list['product'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Category</h4>
                            <h5>{{ page.props.list['category'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Customer</h4>
                            <h5>{{ page.props.list['customer'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Invoice</h4>
                            <h5>{{ page.props.list['invoice'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Total Sale</h4>
                            <h5>$ {{ page.props.list['total'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Vat Collection</h4>
                            <h5>$ {{ page.props.list['vat'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 dh_item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="item">
                            <h4>Total Collection</h4>
                            <h5>$ {{ page.props.list['payable'] }}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>

    import { usePage } from '@inertiajs/vue3'
    const page = usePage()

</script>

<style scoped>

</style>
