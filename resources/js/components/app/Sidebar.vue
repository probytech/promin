<script setup>
import { Link } from "@inertiajs/vue3";
import DashboardIcon from "../icons/DashboardIcon.vue";
import CollectionsIcon from "../icons/CollectionsIcon.vue";
</script>

<template>
	<aside
		class="pl-8 pr-32 relative overflow-hidden py-8 h-auto bg-black border-r border-stroke flex flex-col justify-between"
	>
		<div class="flex items-center mb-8">
			<Link :href="route('promin.dashboard')">
				<svg
					class="w-9 h-9"
					width="150"
					height="150"
					viewBox="0 0 150 150"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<rect width="150" height="150" rx="20" fill="#1467E5" />
					<path
						d="M117.297 72.1458L104.529 68.489C98.779 66.8644 93.5412 63.7882 89.3168 59.5547C85.0925 55.3212 82.0229 50.0721 80.4018 44.3096L76.753 31.5135C76.5695 31.0658 76.2573 30.6829 75.8562 30.4134C75.455 30.1439 74.9829 30 74.5 30C74.017 30 73.545 30.1439 73.1438 30.4134C72.7427 30.6829 72.4305 31.0658 72.247 31.5135L68.5982 44.3096C66.9771 50.0721 63.9075 55.3212 59.6832 59.5547C55.4588 63.7882 50.221 66.8644 44.471 68.489L31.7025 72.1458C31.2122 72.2852 30.7807 72.5811 30.4735 72.9886C30.1662 73.3961 30 73.8929 30 74.4036C30 74.9144 30.1662 75.4112 30.4735 75.8187C30.7807 76.2261 31.2122 76.522 31.7025 76.6615L44.471 80.3182C50.221 81.9428 55.4588 85.019 59.6832 89.2526C63.9075 93.4861 66.9771 98.7352 68.5982 104.498L72.247 117.294C72.3862 117.785 72.6814 118.218 73.088 118.525C73.4946 118.833 73.9904 119 74.5 119C75.0096 119 75.5054 118.833 75.912 118.525C76.3186 118.218 76.6138 117.785 76.753 117.294L80.4018 104.498C82.0229 98.7352 85.0925 93.4861 89.3168 89.2526C93.5412 85.019 98.779 81.9428 104.529 80.3182L117.297 76.6615C117.788 76.522 118.219 76.2261 118.527 75.8187C118.834 75.4112 119 74.9144 119 74.4036C119 73.8929 118.834 73.3961 118.527 72.9886C118.219 72.5811 117.788 72.2852 117.297 72.1458Z"
						fill="white"
					/>
				</svg>
			</Link>
			<div class="ml-3">
				<a href="/" target="_blank" class="text-base text-white font-medium">{{
					$page.props.app.name
				}}</a>
				<div class="text-sm text-grey">Promin</div>
			</div>
		</div>

		<div class="flex-1 flex flex-col gap-4">
			<Link
				:href="route('promin.dashboard')"
				class="text-lg text-white hover:text-primary flex items-center duration-300"
			>
				<DashboardIcon class="w-6 h-6 mr-3" />
				Dashboard
			</Link>

			<div v-if="$page.props.isSuperAdmin">
				<div class="text-sm text-grey my-2">Builder</div>
				<div class="flex flex-col gap-4">
					<Link
						:href="route('promin.builder.collections')"
						class="text-lg text-white hover:text-primary flex items-center duration-300"
					>
						<CollectionsIcon class="w-6 h-6 mr-3" />
						Collections
					</Link>
				</div>
			</div>

			<div>
				<div class="text-sm text-grey my-2">Menu</div>
				<div class="flex flex-col gap-4">
					<div
						class="flex flex-col gap-4"
						v-for="dropdownItem in $page.props.app.menu"
					>
						<Link
							:href="route('promin.collections.index', menuItem.table_name)"
							class="text-lg text-white hover:text-primary flex items-center duration-300"
							v-for="menuItem in dropdownItem"
						>
							<CollectionsIcon class="w-6 h-6 mr-3" />
							{{ menuItem.title }}
						</Link>
					</div>
				</div>
			</div>
		</div>

		<div class="relative z-10">
			<Link
				class="flex items-center text-lg text-white hover:text-primary duration-300"
				:href="route('promin.logout.store')"
				method="post"
				as="button"
			>
				<svg
					class="w-5 h-5 mr-2"
					width="20"
					height="21"
					viewBox="0 0 20 21"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						class="stroke-current"
						d="M8.125 3.625H3.75C3.58424 3.625 3.42527 3.69085 3.30806 3.80806C3.19085 3.92527 3.125 4.08424 3.125 4.25V16.75C3.125 16.9158 3.19085 17.0747 3.30806 17.1919C3.42527 17.3092 3.58424 17.375 3.75 17.375H8.125"
						stroke="currentColor"
						stroke-width="1.25"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
					<path
						class="stroke-current"
						d="M8.125 10.5H16.875"
						stroke="currentColor"
						stroke-width="1.25"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
					<path
						class="stroke-current"
						d="M13.75 7.375L16.875 10.5L13.75 13.625"
						stroke="currentColor"
						stroke-width="1.25"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
					<clipPath>
						<rect
							width="20"
							height="20"
							fill="white"
							transform="translate(0 0.5)"
						/>
					</clipPath>
				</svg>
				Logout
			</Link>
		</div>

		<div
			class="absolute z-0 -bottom-48 -left-48 w-[32rem] h-[32rem] opacity-60"
			style="
				background: radial-gradient(
					50% 50% at 50% 50%,
					#165bc3 0%,
					#0d0d0d 100%
				);
			"
		></div>
	</aside>
</template>
