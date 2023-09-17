<template>
    <div>
        <button class="flex btn" @click="openModal">Buat Data</button>
        <dialog ref="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                    >
                        ✕
                    </button>
                </form>
                <h3 class="font-bold text-lg">Input Your Data</h3>
                <form @submit.prevent="submitForm" method="dialog">
                    <!-- control input name -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input
                            type="text"
                            v-model="form.name"
                            name="name"
                            placeholder="Zeta"
                            class="input input-bordered w-full"
                        />
                    </div>
                    <!-- control input email -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input
                            type="email"
                            v-model="form.email"
                            name="email"
                            placeholder="example@techno.com"
                            class="input input-bordered w-full"
                        />
                    </div>
                    <!-- control input password -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input
                            type="password"
                            v-model="form.password"
                            name="password"
                            placeholder="enter your pasword"
                            class="input input-bordered w-full"
                        />
                    </div>

                    <input
                        type="submit"
                        value="create data"
                        class="btn btn-success mt-5"
                    />
                </form>
            </div>
        </dialog>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
});


const my_modal_3 = ref();

const openModal = () => {
    my_modal_3.value.showModal();

};

const closeModal = () => {
    my_modal_3.value.close();
};

const submitForm = () => {
        form.post("/user/store", {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                form.reset("name", "email", "password");
                closeModal();
            },
        });
};
</script>
