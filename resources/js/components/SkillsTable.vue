<template>
    <div>
        <div
            v-for="technologie in technologies"
            v-bind:key="technologie"
            class="button-group filter-button-group"
        >
            <div class="btn filter" :data-filter="technologie">
                "technologie"
            </div>
        </div>
        <div class="grid">
            <div
                v-for="project in projects"
                v-bind:key="project.id"
                class="grid-item"
                :class="project.type"
            >
                <a
                    :href="
                        'portfolio/' +
                            project.titel.toLowerCase().replace(/\s/g, '')
                    "
                >
                    <img
                        :src="
                            'images/' +
                                project.titel.toLowerCase().replace(/\s/g, '') +
                                '.jpg'
                        "
                        :alt="project.titel"
                    />
                </a>
                <div class="technologie v-flexer">
                    <ion-icon :name="'logo-' + project.type"></ion-icon>
                    {{ project.titel }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            technologies: [],
            projects: [],
            project: {
                id: "",
                titel: "",
                year: "",
                url: "",
                smalldescr: "",
                descr: "",
                type: "",
                company: ""
            }
        };
    },
    created() {
        this.fetchArticles(), this.fetchTechnologies();
    },
    methods: {
        fetchArticles() {
            fetch("api/projects")
                .then(res => res.json())
                .then(res => {
                    this.projects = res;
                });
        },
        fetchTechnologies() {
            fetch("api/technologies")
                .then(res => res.json())
                .then(res => {
                    this.technologies = res;
                });
        }
    }
};
</script>
