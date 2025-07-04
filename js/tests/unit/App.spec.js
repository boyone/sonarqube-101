import { shallowMount } from '@vue/test-utils'
import App from '@/App.vue'
import HelloWorld from '@/components/HelloWorld.vue'

describe('App.vue', () => {
  it('renders HelloWorld component', () => {
    const wrapper = shallowMount(App)
    expect(wrapper.findComponent(HelloWorld).exists()).toBe(true)
  })

  it('has the correct title', () => {
    const wrapper = shallowMount(App)
    expect(wrapper.find('h1').text()).toBe('Vue.js 2 SonarQube Project')
  })

  it('passes the correct prop to HelloWorld', () => {
    const wrapper = shallowMount(App)
    const helloWorldComponent = wrapper.findComponent(HelloWorld)
    expect(helloWorldComponent.props('msg')).toBe('Welcome to Your Vue.js App')
  })
})