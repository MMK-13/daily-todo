<template>
	<div class="page">
		<div class="overlay" @click="close"></div>
		<div class="modal">
			<div class="modal__header">
				Добавить задание
				<i class="material-icons" @click="close">close</i>
			</div>
			<form class="modal__body">
				<div class="form-row">
					<label class="form-row__label" for="date">Дата</label>
					<input id="date" type="date" class="form-row__input" v-model="date">
				</div>
				<div class="form-row">
					<label class="form-row__label" for="hour">Время</label>
					<input id="hour" type="time" class="form-row__input" v-model="hour">
				</div>
				<div class="form-row">
					<label class="form-row__label" for="title">Титул</label>
					<input id="title" type="text" class="form-row__input" v-model="title">
				</div>
				<div class="form-row">
					<label class="form-row__label" for="content">Контент</label>
					<textarea id="content" type="date" class="form-row__input" rows="3" v-model="content"></textarea>
				</div>
				<div class="form-row">
					<label class="form-row__label" for="category">Категория</label>
					<select id="category" class="form-row__input" v-model="category">
						<option value="">Категория</option>
						<option v-for="category in getCategories"
								:key="category.id"
								:value="category.id"
								:style="getBG(category.color)">{{ category.name }}</option>
					</select>
				</div>

			</form>
			<div class="modal__footer">
				<button class="btn btn-primary" @click="saveTodo">
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
		name: 'AddTodoModal',
		data() {
			return {
				date: '',
				hour: '',
				title: '',
				content: '',
				category: ''
			}
		},
		methods: {
			...mapActions(['loadData']),
			close() {
				this.$emit('close')
			},
			getBG(color) {
				return 'color: ' + color + ';'
			},
			saveTodo() {
				fetch('http://todo.ru/add-todo', {
					method: 'POST',
					body: JSON.stringify({
						date: this.date,
						hour: this.hour,
						title: this.title,
						content: this.content,
						category: this.category
					})
				}).then((response) => response.json())
				.then((data) => console.log(data))
				this.loadData()
				this.close()
			}
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
</style>