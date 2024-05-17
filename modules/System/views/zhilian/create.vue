<template>
  <el-form :model="formData" label-width="120px" ref="form" v-loading="loading" class="pr-4">
    <el-form-item label="username" prop="username">
  <el-input v-model="formData.username" name="username" clearable />
</el-form-item>
<el-form-item label="giteeusername" prop="giteeusername">
  <el-input v-model="formData.giteeusername" name="giteeusername" clearable />
</el-form-item>
<el-form-item label="giteerepo" prop="giteerepo">
  <el-input v-model="formData.giteerepo" name="giteerepo" clearable />
</el-form-item>
<el-form-item label="giteetoken" prop="giteetoken">
  <el-input v-model="formData.giteetoken" name="giteetoken" clearable />
</el-form-item>
<el-form-item label="githubusername" prop="githubusername">
  <el-input v-model="formData.githubusername" name="githubusername" clearable />
</el-form-item>
<el-form-item label="githubrepo" prop="githubrepo">
  <el-input v-model="formData.githubrepo" name="githubrepo" clearable />
</el-form-item>
<el-form-item label="githubtoken" prop="githubtoken">
  <el-input v-model="formData.githubtoken" name="githubtoken" clearable />
</el-form-item>
<el-form-item label="title" prop="title">
  <el-input v-model="formData.title" name="title" clearable />
</el-form-item>
<el-form-item label="anurl" prop="anurl">
  <el-input v-model="formData.anurl" name="anurl" clearable />
</el-form-item>
<el-form-item label="tzurl" prop="tzurl">
  <el-input v-model="formData.tzurl" name="tzurl" clearable />
</el-form-item>
    <div class="flex justify-end">
      <el-button type="primary" @click="submitForm(form)">{{ $t('system.confirm') }}</el-button>
    </div>
  </el-form>
</template>

<script lang="ts" setup>
import { useCreate } from '/admin/composables/curd/useCreate'
import { useShow } from '/admin/composables/curd/useShow'
import { onMounted } from 'vue'

const props = defineProps({
  primary: String | Number,
  api: String,
})

const { formData, form, loading, submitForm, close } = useCreate(props.api, props.primary)

if (props.primary) {
  useShow(props.api, props.primary, formData)
}

const emit = defineEmits(['close'])
onMounted(() => {
  close(() => emit('close'))
})
</script>
