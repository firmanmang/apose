<template>
    <AdminLayout title="Ruang Kelas">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4">
                <ClassroomTable :schools="schools" :classrooms="classrooms" />
            </div>
        </div>
    </AdminLayout>
</template>
<script>
import AdminLayout from "@/Layouts/Admin.vue";
import ClassroomTable from "./Component/ClassroomTable.vue";

export default {
    props: ["schools", "classrooms"],
    components: {
        AdminLayout,
        ClassroomTable,
    },
};
</script>

