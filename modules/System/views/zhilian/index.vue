<template>
    <el-card v-if="formData">
        <el-form :model="formData" label-width="120px" ref="form" class="pr-4">
            <el-form-item label="username" prop="username">
                <el-input v-model="formData.username" name="username" clearable/>
            </el-form-item>
            <el-form-item label="giteeusername" prop="giteeusername">
                <el-input v-model="formData.giteeusername" name="giteeusername" clearable/>
            </el-form-item>
            <el-form-item label="giteerepo" prop="giteerepo">
                <el-input v-model="formData.giteerepo" name="giteerepo" clearable/>
            </el-form-item>
            <el-form-item label="giteetoken" prop="giteetoken">
                <el-input v-model="formData.giteetoken" name="giteetoken" clearable/>
            </el-form-item>
            <el-form-item label="githubusername" prop="githubusername">
                <el-input v-model="formData.githubusername" name="githubusername" clearable/>
            </el-form-item>
            <el-form-item label="githubrepo" prop="githubrepo">
                <el-input v-model="formData.githubrepo" name="githubrepo" clearable/>
            </el-form-item>
            <el-form-item label="githubtoken" prop="githubtoken">
                <el-input v-model="formData.githubtoken" name="githubtoken" clearable/>
            </el-form-item>
            <el-form-item label="title" prop="title">
                <el-input v-model="formData.title" name="title" clearable/>
            </el-form-item>
            <el-form-item label="anurl" prop="anurl">
                <el-input v-model="formData.anurl" name="anurl" clearable/>
            </el-form-item>
            <el-form-item label="tzurl" prop="tzurl">
                <el-input v-model="formData.tzurl" name="tzurl" clearable/>
            </el-form-item>

            <div class="flex justify-end">
                <el-button type="primary" @click="submit()">{{ $t('system.confirm') }}</el-button>
            </div>
        </el-form>
    </el-card>

</template>

<script lang="ts" setup>
import {onMounted, ref} from 'vue'
import http from "/admin/support/http";
import {Code} from "/admin/enum/app";
import Message from "/admin/support/message";



const formData = ref(null)
const get = async () => {
    const result = await http.get('/system/zhilian/get')
    formData.value = result.data.data
}

const submit = () => {
    const result = http.post('/system/zhilian/create_or_update', formData.value)
    result
        .then(r => {
            if (r.data.code === Code.SUCCESS) {
                Message.success(r.data.message)
            } else {
                Message.error(r.data.message)
            }
        })
}

onMounted(() => {
    get()
})
</script>
