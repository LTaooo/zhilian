<template>
    <div>
        <Search :search="search" :reset="reset">
            <template v-slot:body>
                <el-form-item label="username" prop="username">
                    <el-input v-model="query.username" name="username" clearable/>
                </el-form-item>

            </template>
        </Search>
        <div class="table-default">
            <Operate :show="open"/>
            <el-table :data="tableData" class="mt-3" v-loading="loading">
                <el-table-column prop="id" label="id"/>
                <el-table-column prop="username" label="username"/>
                <el-table-column prop="giteeusername" label="giteeusername"/>
                <el-table-column prop="giteerepo" label="giteerepo"/>
                <el-table-column prop="giteetoken" label="giteetoken"/>
                <el-table-column prop="githubusername" label="githubusername"/>
                <el-table-column prop="githubrepo" label="githubrepo"/>
                <el-table-column prop="githubtoken" label="githubtoken"/>
                <el-table-column prop="title" label="title"/>
                <el-table-column prop="anurl" label="anurl"/>
                <el-table-column prop="tzurl" label="tzurl"/>
                <el-table-column prop="created_at" label="created_at"/>
                <el-table-column prop="updated_at" label="updated_at"/>
                <el-table-column label="操作" width="200">
                    <template #default="scope">
                        <Update @click="open(scope.row.id)"/>
                        <Destroy @click="destroy(api, scope.row.id)"/>
                    </template>
                </el-table-column>
            </el-table>
            <Paginate/>
        </div>

        <Dialog v-model="visible" :title="title" destroy-on-close>
            <Create @close="close(reset)" :primary="id" :api="api"/>
        </Dialog>
    </div>
</template>

<script lang="ts" setup>
import {computed, onMounted, ref} from 'vue'
import Create from './create.vue'
import {useGetList} from '/admin/composables/curd/useGetList'
import {useDestroy} from '/admin/composables/curd/useDestroy'
import {useOpen} from '/admin/composables/curd/useOpen'
import {useUserStore} from "/admin/stores/modules/user";
import http from '/admin/support/http'

const api = 'system/zhilian'

const {data, query, search, reset, loading} = useGetList(api)
const {destroy, deleted} = useDestroy()
const {open, close, title, visible, id} = useOpen()
const userStore = useUserStore()


const tableData = computed(() => data.value?.data)
const zhilian = ref(null)
const getZhilian = async () => {
    const result = await http.get('/system/zhilian/get')
    zhilian.value = result.data.data
}


onMounted(() => {
    search()
    deleted(reset)
    getZhilian()
})
</script>
