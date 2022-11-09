<template>
	<div class="header">
		<div class="header__title">
			Ежедневник
		</div>
		<div class="header__actions">
			<div class="action" @click="addTodoModal">
				Добавить работу
				<i class="material-icons">add_circle</i>
			</div>
			<div class="action" @click="addCategoryModal">
				Категории
				<i class="material-icons">settings</i>
			</div>
		</div>
		<Transition name="fade">
			<AddTodoModal v-if="showTodoModal" @close="closed" />
		</Transition>
		<Transition name="fade">
			<AddCategoryModal v-if="showCategoryModal" @close="closed" />
		</Transition>
	</div>
</template>

<script>
	import AddTodoModal from './AddTodoModal'
	import AddCategoryModal from './AddCategoryModal'

	export default {
		name: 'TopHeader',
		components: {
			AddTodoModal,
			AddCategoryModal,
		},
		data() {
			return {
				showTodoModal: false,
				showCategoryModal: false,
			}
		},
		methods: {
			addTodoModal() {
				this.showTodoModal = true
			},
			addCategoryModal() {
				this.showCategoryModal = true
			},
			closed() {
				this.showTodoModal = false
				this.showCategoryModal = false
			},
		},
	}
</script>

<style scoped>
	.fade-enter-active,
	.fade-leave-active {
		transition: opacity 0.5s ease;
	}

	.fade-enter-from,
	.fade-leave-to {
		opacity: 0;
	}
	.header {
		padding: 0 64px;
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: space-between;
		background-color: var(--primary-color);
		font-weight: 900;
		color: #FFF;
		border-bottom: var(--primary-hover-color);
		box-shadow: 2px 2px 8px var(--light-color);
	}
	.header__title {
		font-style: italic;
		font-size: 18px;
	}
	.header__actions {
		display: flex;
		flex-direction: row;
		gap: 16px;
	}
	.action {
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: space-between;
		gap: 8px;
		padding: 6px 12px;
		border-radius: 4px;
		cursor: pointer;
	}
	.action:hover {
		background-color: var(--primary-hover-color);
	}
</style>