import random


def get_key():
    random_Str = ''
    string = "QWERTYUIOPASDFGHJKLZXCVBNMqweryuiopasdfghjklzxcvbnm@#!%^*(-+="
    length = len(string) - 1
    for i in range(len(string)):
        random_Str += string[random.randint(0, length)]
    return random_Str


truekey = get_key()
