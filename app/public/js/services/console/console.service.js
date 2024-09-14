class ConsoleService {
  
    static setContent(content, type = "DEBUT") {
        console.log(`[${type}]: `,content)
    }
}

export default ConsoleService;