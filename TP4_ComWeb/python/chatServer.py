import websockets
import asyncio

class chatBackend :
    def __init__(self) :
        self.__tab = list()
        self.__lastmess = ""

    async def clientHandler(self,websocket, path) :
        while True:
                print (websocket in self.__tab)
                if (websocket in self.__tab) == False :
                    self.__tab.append(websocket)
                try :
                    receivedMessage = await websocket.recv()
                    print("Message reçu : "+ receivedMessage)
                    for user in self.__tab :
                        try :
                            await user.send(receivedMessage)
                        except:
                            self.__tab.remove(user)
                except:
                    print(" une erreur est survenu mais rien de bien mechant :)")
                    
                



       
        

    def runServer(self) :
        server = websockets.serve(self.clientHandler, "localhost", 12345)
        asyncio.get_event_loop().run_until_complete(server)
        asyncio.get_event_loop().run_forever()


serv = chatBackend()
serv.runServer()
