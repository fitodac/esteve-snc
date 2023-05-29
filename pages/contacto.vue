<script setup>
import Layout from '@/layouts/Layout'

import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/Form/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import {reactive} from "vue";

const {specialty_options} = defineProps({
  specialty_options: {
    type: Array,
    default: () => ([
      {
        value: 'neurologia',
        label: 'Neurología'
      },
      {
        value: 'psiquiatria',
        label: 'Psiquiatría'
      },
      {
        value: 'geriatria',
        label: 'Geriatría'
      },
      {
        value: 'medicina-familiar',
        label: 'Medicina Familiar'
      },
      {
        value: 'medicina-general',
        label: 'Medicina General'
      },
    ])
  }
})

const form = reactive({
  processing: false,
  name: '',
  lastname: '',
  email: '',
  speciality: '',
  work_center: '',
  phone: '',
  message: '',
  acceptance: false,
  errors: {
    name: '',
    lastname: '',
    email: '',
    speciality: '',
    work_center: '',
    phone: '',
    message: '',
  }
})


const specialty_dropdown = ref('')

const triggerDropdown = (opt) => {
  specialty_dropdown.value = opt.label
  form.speciality = opt.value
}


const submit = () => {
  console.log(form);
}

</script>

<template>
  <Layout navbarColor="dark">

    <form
        class=" pb-20"
        @submit.prevent="submit">

      <div class="container global px-6 xl:px-0 max-w-5xl mx-auto">
        <div class="text-center my-2 sm:my-6">
          <h2 class="font-bold text-3xl text-aqua my-2 sm:my-4">CONTACTO</h2>
          <div class="intro">Contáctanos mediante el formulario que tienes a continuación:</div>
        </div>

        <div class="grid gap-y-6">
          <div class="grid gap-6 md:grid-cols-2">
            <div class="">
              <InputLabel value="Nombre*" class="text-aqua"/>

              <TextInput
                  id="name"
                  type="text"
                  class="mt-2 block w-full"
                  v-model="form.name"/>

              <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div class="">
              <InputLabel value="Apellido*"/>

              <TextInput
                  id="lastname"
                  type="text"
                  class="mt-2 block w-full"
                  v-model="form.lastname"/>

              <InputError class="mt-2" :message="form.errors.lastname"/>
            </div>
          </div>

          <div class="">
            <InputLabel value="Correo electrónico*"/>

            <TextInput
                id="email"
                type="text"
                class="mt-2 block w-full"
                v-model="form.email"/>

            <InputError class="mt-2" :message="form.errors.email"/>
          </div>


          <div class="">
            <InputLabel value="Especialidad"/>

            <Dropdown>
              <template #trigger>
                {{ specialty_dropdown }}
              </template>

              <template #content>
                <Option
                    v-for="opt in specialty_options"
                    :key="opt.value"
                    @click="triggerDropdown(opt)">
                  {{ opt.label }}
                </Option>
              </template>
            </Dropdown>

            <InputError class="mt-2" :message="form.errors.speciality"/>
          </div>


          <div class="">
            <InputLabel value="Centro de trabajo"/>

            <TextInput
                id="workcenter"
                type="text"
                class="mt-2 block w-full"
                v-model="form.work_center"/>

            <InputError class="mt-2" :message="form.errors.work_center"/>
          </div>


          <div class="">
            <InputLabel value="Teléfono"/>

            <TextInput
                id="phone"
                type="text"
                class="mt-2 block w-full"
                v-model="form.phone"/>

            <InputError class="mt-2" :message="form.errors.phone"/>
          </div>


          <div class="">
            <InputLabel value="Mensaje"/>

            <textarea
                id="message"
                class="bg-white border border-gray-400 text-gray-600
										leading-none w-full h-40 px-4 py-2.5
										mt-2 block rounded-lg resize-none
										focus:outline-0 focus:ring-0 focus:border-gray-400"
                v-model="form.message"></textarea>

            <InputError class="mt-2" :message="form.errors.message"/>
          </div>


          <div class="block select-none">
            <label class="inline-flex items-center">
              <Checkbox name="remember" v-model:checked="form.acceptance"/>

              <span
                  class="text-gray-600 cursor-pointer pl-3">
							He leído y acepto la

							<a
                  href="https://www.esteveagora.com/es/privacidad"
                  target="_blank"
                  class="text-aqua font-bold pl-0.5 hover:underline">
								política de privacidad
							</a>
						</span>
            </label>
            <InputError class="mt-2" :message="form.errors.acceptance"/>
          </div>
          <div class="container global">
            <div class="flex justify-center">
              <button
                  @click="submit"
                  type="submit"
                  class="btn-primary text-white bg-purple hover:bg-purple-dark rounded-xl py-4 px-24 font-bold"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing">
                <span>ENVIAR</span>
              </button>

            </div>
          </div>
        </div>
      </div>


    </form>
  </Layout>
</template>

<style scoped></style>
