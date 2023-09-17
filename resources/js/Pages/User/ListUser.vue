<template>
    <div class="max-w-7xl mx-auto mt-10">
        <div class="flex justify-center mb-5">
            <!-- modal create data here -->
            <modalCreateUserVue />
            <!-- just flip animation -->
            <label class="swap swap-flip text-5xl">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" />
                <div class="swap-on">😈</div>
                <div class="swap-off">😇</div>
            </label>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr class="bg-base-300">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr
                        v-for="user in users"
                        :key="user"
                        class="hover:bg-gray-700 hover:text-white duration-200"
                    >
                        <th>{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td class="flex">
                            <!-- <a href="" class="btn btn-sm btn-warning">Edit</a> -->

                            <!-- <modalEditUser /> -->
                            <div class="text-black">
                                <button
                                    class="btn btn-sm btn-warning"
                                    @click="openModal(user.id)"
                                >
                                    Edit
                                </button>
                                <dialog ref="my_modal_4" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button
                                                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                                            >
                                                ✕
                                            </button>
                                        </form>
                                        <h3 class="font-bold text-lg">
                                            Edit Your Data
                                        </h3>
                                        <form
                                            @submit.prevent="submitForm"
                                            method="dialog"
                                        >
                                            <!-- control input edit name -->
                                            <div class="form-control w-full">
                                                <label class="label">
                                                    <span class="label-text"
                                                        >Name</span
                                                    >
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
                                                    <span class="label-text"
                                                        >Email</span
                                                    >
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
                                                    <span class="label-text"
                                                        >Password</span
                                                    >
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
                            <a href="" class="btn btn-sm btn-error ml-2"
                                >Delete</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>

import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";
import modalCreateUserVue from "../../components/modalCreateUser.vue";

defineProps({
    users: Object,
});

const form = useForm({
    id: "",
    name: "",
    email: "",
    password: "",
});

const my_modal_4 = ref();

function dataEdit(id) {
    axios.get("/user/edit/" + id).then((res) => {
        form.id = res.data.id
        form.name = res.data.name
    });
    openModal()
}


const openModal = (id) => {
    my_modal_4.value.showModal()
    dataEdit(id)
}

const closeModal = () => {
    my_modal_4.value.close();
};


</script>

<style></style>
