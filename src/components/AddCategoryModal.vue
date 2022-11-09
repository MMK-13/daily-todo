<template>
	<div class="page">
		<div class="overlay" @click="close"></div>
		<div class="modal">
			<div class="modal__header">
				Добавить категорию
				<i class="material-icons" @click="close">close</i>
			</div>
			<form class="modal__body">
				<div class="form-row">
					<label class="form-row__label" for="category">Категория</label>
					<input id="category" type="text" class="form-row__input" v-model="category">
				</div>
				<div class="form-row">
					<label class="form-row__label" for="color">Цвет</label>
					<input id="color" type="color" class="form-row__input" v-model="color">
				</div>
			</form>
			<div class="categories">
				<span class="categories__item" v-for="category in getCategories"
					:key="category.id"
					:style="'background-color: ' + category.color"
					@click="deleteCategory(category.id)">{{ category.name }}</span>
			</div>
			<div class="modal__footer">
				<button class="btn btn-primary" @click="saveCategory">
					<i class="material-icons">save</i>
					Сохранить
				</button>
				<button class="btn btn-default" @click="close">
					<i class="material-icons">cancel</i>
					Отменить
				</button>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		name: 'AddCategoryModal',
		data() {
			return {
				category: '',
				color: '',
			}
		},
		methods: {
			...mapActions(['loadData']),
			close() {
				this.$emit('close')
			},
			saveCategory() {
				fetch('http://todo.ru/add-category', {
					method: 'POST',
					body: JSON.stringify({
						category: this.category,
						color: this.color
					})
				}).then((response) => response.json())
				.then((data) => console.log(data))
				this.loadData()
				this.close()
			},
			deleteCategory(id) {
				if (confirm('Вы уверены, что хотите удалить его?')) {
					fetch('http://todo.ru/delete-category/' + id)
					.then((response) => response.json())
					.then((data) => console.log(data))
					this.loadData()
					this.close()
				}
			},
		},
		computed: {
			...mapGetters(['getCategories']),
		},
	}
</script>

<style scoped>
	.page {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		z-index: 100;
	}
	.overlay {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		z-index: 101;
		background-color: #000;
		opacity: .5;
	}
	.modal {
		z-index: 102;
		position: relative;
		margin: 80px auto;
		background-color: #FFF;
		width: 480px;
		color: #0A0A0A;
		border-radius: 4px;
	}
	.modal__header {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		padding: 8px 16px;
		background-color: var(--secondary-color);
		color: #FFF;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
	}
	.modal__header i {
		cursor: pointer;
	}
	.modal__header i:hover {
		font-weight: 900;
		transform: scale(1.1);
	}
	.modal__body {
		display: flex;
		flex-direction: column;
		gap: 8px;
		padding: 8px 16px;
		font-weight: 500;
	}
	.form-row {
		display: flex;
		flex-direction: column;
		gap: 4px;
		font-size: 16px;
	}
	.form-row__label {
		font-weight: 700;
	}
	.form-row__input {
		outline: none;
		padding: 4px 8px;
		border: 1px solid #0A0A0A;
		border-radius: 4px;
	}
	.form-row__input:focus {
		border: 1px solid var(--primary-color);
	}
	.modal__footer {
		display: flex;
		flex-direction: row;
		justify-content: center;
		gap: 16px;
		padding: 16px;
	}
	.btn {
		display: flex;
		flex-direction: row;
		align-items: center;
		gap: 8px;
		padding: 8px 16px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}
	.btn-primary {
		background-color: var(--secondary-color);
		color: #FFF;
	}
	.btn-primary:hover {
		background-color: var(--primary-color);
	}
	.btn-default {
		background-color: #FAFAFA;
	}
	.btn-default:hover {
		background-color: #CACACA;
	}
	.categories {
		display: flex;
		flex-direction: row;
		gap: 8px;
		padding: 8px 16px;
	}
	.categories__item {
		padding: 8px;
		color: #FFF;
		border-radius: 4px;
		cursor: pointer;
	}
</style>