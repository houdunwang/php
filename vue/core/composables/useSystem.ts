import { getSystem, updateSystem } from '@@/apis/system'

export default () => {
  const system = ref<SystemModel>()

  const find = async () => {
    system.value = await getSystem()
  }

  const update = async (model: SystemModel) => {
    await updateSystem(model)
  }

  return { system, find, update }
}
