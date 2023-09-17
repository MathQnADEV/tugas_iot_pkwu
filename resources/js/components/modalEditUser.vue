<template>
    <div class="text-black">
        <button class="btn btn-sm btn-warning" @click="dataEdit(user.id)">
            Edit
        </button>
        <dialog ref="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                    >
                        ✕
                    </button>
                </form>
                <h3 class="font-bold text-lg">Edit Your Data</h3>
                <form @submit.prevent="submitForm" method="dialog">
                    <!-- control input edit name -->
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
                    <!-- control input edit email -->
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
                    <!-- control input edit password -->
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
                        value="Edit Data"
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
import axios from "axios";

const form = useForm({
    id: "",
    name: "",
    email: "",
    password: "",
});

const my_modal_3 = ref();

// const openModal = (id) => {
//     my_modal_3.value.showModal();
//     dataEdit(id)

// };

// const dataEdit = (id) => {
//     axios.get('/user/edit/' + id).then((res) => {
//         form.id = res.data.id
//         form.name = res.data.name
//         my_modal_3.value.showModal()
//     })
// }

function dataEdit(id) {
    axios.get("/user/edit/" + id).then((res) => {
        form.id = res.data.id
        form.name = res.data.name
        my_modal_3.value.showModal()
    });
}

const closeModal = () => {
    my_modal_3.value.close();
};

const submitForm = () => {
    // form.post("/user/store", {
    //     preserveScroll: true,
    //     preserveState: true,
    //     onSuccess: () => {
    //         form.reset("name", "email", "password");
    //         closeModal();
    //     },
    // });
};
</script>
