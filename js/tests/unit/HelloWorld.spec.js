import { shallowMount } from '@vue/test-utils'
import HelloWorld from '@/components/HelloWorld.vue'

describe('HelloWorld.vue', () => {
  it('renders props.msg when passed', () => {
    const msg = 'new message'
    const wrapper = shallowMount(HelloWorld, {
      propsData: { msg }
    })
    expect(wrapper.text()).toMatch(msg)
  })

  it('contains the correct title', () => {
    const msg = 'Welcome to Your Vue.js App'
    const wrapper = shallowMount(HelloWorld, {
      propsData: { msg }
    })
    expect(wrapper.find('h1').text()).toBe(msg)
  })

  it('contains essential links', () => {
    const msg = 'Welcome to Your Vue.js App'
    const wrapper = shallowMount(HelloWorld, {
      propsData: { msg }
    })
    const links = wrapper.findAll('a')
    expect(links.length).toBeGreaterThan(0)
  })
})