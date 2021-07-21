<template>
    <div class="menu-list">
        <q-list>
            <q-item
                clickable
                v-ripple
                replace
                class="is-parent"
                :class="{
                    'q-item--active': isActive('/admin/dashboard'),
                }"
                @click="$inertia.visit('/admin/dashboard')"
            >
                <q-item-section avatar>
                    <q-icon name="dashboard" color="blue-grey-9" />
                </q-item-section>

                <q-item-section> Dashboard </q-item-section>
            </q-item>

            <div v-for="item in menu" :key="item.id">
                <q-list
                    v-if="item.child.length > 0"
                    style="border-bottom: 1px solid #d8d8d8"
                >
                    <q-expansion-item
                        expand-separator
                        group="submenu"
                        exact-active-class="q-item--active"
                        :class="{
                            'q-item--active':
                                isActive(item.link) && item.child.length === 0,
                            'is-parent': item.child.length === 0,
                        }"
                        :default-opened="isActive(item.link)"
                    >
                        <template v-slot:header>
                            <q-item-section avatar>
                                <q-icon
                                    :style="`color:${item.color}`"
                                    :class="{
                                        'menu-icon-img':
                                            item.icon.includes('http'),
                                    }"
                                    :name="
                                        item.icon.includes('http')
                                            ? `img:${item.icon}`
                                            : item.icon
                                    "
                                />
                            </q-item-section>

                            <q-item-section>
                                {{ item.name }}
                            </q-item-section>
                        </template>

                        <div v-for="item2 in item.child" :key="item2.id">
                            <q-expansion-item
                                :header-inset-level="0.5"
                                class="submenu"
                                :replace="item2.child2.length > 0 ? '' : true"
                                :class="{
                                    'q-item--active': isActive(item2.link),
                                    'no-icon': item2.child2.length === 0,
                                }"
                                @click="
                                    item2.child2.length > 0
                                        ? ''
                                        : $inertia.visit(item2.link)
                                "
                                :default-opened="isActive(item2.link)"
                            >
                                <template v-slot:header>
                                    <q-item-section avatar>
                                        <q-icon
                                            :style="`color:${item2.color}`"
                                            :class="{
                                                'menu-icon-img':
                                                    item.icon.includes('http'),
                                            }"
                                            :name="
                                                item2.icon.includes('http')
                                                    ? `img:${item2.icon}`
                                                    : item2.icon
                                            "
                                        />
                                    </q-item-section>

                                    <q-item-section>
                                        {{ item2.name }}
                                    </q-item-section>
                                </template>

                                <q-expansion-item
                                    v-for="item3 in item2.child2"
                                    :key="item3.id"
                                    :header-inset-level="1"
                                    :class="{
                                        'q-item--active': isActive(item3.link),
                                    }"
                                    icon="chevron_right"
                                    :label="item3.name"
                                    replace
                                    @click="$inertia.visit(item3.link)"
                                    class="no-icon submenu2"
                                >
                                </q-expansion-item>
                            </q-expansion-item>
                        </div>
                    </q-expansion-item>
                </q-list>

                <q-list v-else style="border-bottom: 1px solid #d8d8d8">
                    <q-item
                        clickable
                        v-ripple
                        :class="{
                            'q-item--active': isActive(item.link),
                        }"
                        replace
                        @click="$inertia.visit(item.link)"
                    >
                        <q-item-section avatar>
                            <q-icon
                                :name="
                                    item.icon.includes('http')
                                        ? `img:${item.icon}`
                                        : item.icon
                                "
                                :class="{
                                    'menu-icon-img': item.icon.includes('http'),
                                }"
                                :style="`color:${item.color}`"
                            />
                        </q-item-section>

                        <q-item-section>
                            {{ item.name }}
                        </q-item-section>
                    </q-item>
                </q-list>
            </div>
            <q-list>
                <q-item
                    clickable
                    v-ripple
                    @click="$inertia.get('/admin/logout')"
                >
                    <q-item-section avatar>
                        <q-icon name="login" color="negative" />
                    </q-item-section>
                    <q-item-section> Logout </q-item-section>
                </q-item>
            </q-list>
        </q-list>
    </div>
</template>

<script>
export default {
    props: ["loading"],
    data() {
        return {
            curentUrl: window.location.pathname,
        };
    },
    computed: {
        menu() {
            return this.$page.props.auth.menu;
        },
    },
    mounted() {
        this.$inertia.on(
            "start",
            (e) => (this.curentUrl = e.detail.visit.url.pathname)
        );
    },
    methods: {
        isActive(link) {
            return this.curentUrl.startsWith(link);
        },
    },
};
</script>

<style lang="scss">
.no-icon {
    border-top: solid 0.1px #d8d8d8;
    .q-expansion-item__toggle-icon {
        display: none;
    }
}
.q-item.q-router-link--active,
.q-item--active {
    background: #1e478038;
}
.submenu {
    border-top: solid 0.1px #d8d8d8;
}
.submenu2 {
    border-top: solid 0.1px #d8d8d8;
    .q-item__section--side {
        min-width: 40px;
    }

    .q-item__section--side > .q-icon {
        font-size: 15px !important;
    }
}

.menu-list > div {
    border-bottom: 1px solid #d8d8d8;
}

.menu-list {
    .is-parent {
        border-bottom: 1px solid #d8d8d8;
    }
    .q-item {
        min-height: 0px;
        font-size: 13px;
    }

    .q-item__section--side > .q-icon {
        font-size: 22px;
    }
}
</style>
