import numpy as np
import json
from django.views.decorators.http import require_http_methods
from django.shortcuts import render


def solve_linear_equation(arr1, arr2, arr3):
    try:
        arr1 = np.loads(arr1.encode())
        arr2 = np.loads(arr2.encode())
        arr3 = np.loads(arr3.encode())
    except Exception as err:
        result = "参数有误"
    unknown_data = np.array([arr1, arr2])
    const_data = np.array([arr3[0], arr3[1]])
    result = np.linalg.solve(unknown_data, const_data)
    return result


# 解二元一次线性方程 arr1为第一个方程的未知项系数，arr2为第二个方程未知项系数，第三个为两个方程的常数项
# 如： 1.x+y=1 对应arr1=[1,1] 2.3x+5y=7 对应arr2 = [3,5] 3.两者对应常数项为arr3 = [1,7]
# loads主要用于导入本地数据

def solve_matrix_dot(arr1, arr2):
    try:
        np_data1 = np.array([arr1])
        np_data2 = np.array([arr2])
    except Exception as err:
        print(err)
    result = np.dot(arr1, arr2)
    return result


# 解矩阵的点乘，由于是用json传，所以理论上只要是[]的格式都可以，不论阶数

@require_http_methods(["GET"])
def index(request):
    if request.method == "GET":
        return render(request, "index.html")


@require_http_methods(["POST", "GET"])
def xy(request):
    try:
        data = json.loads(request.body.decode())
        arr1 = data.get("arr1")
        arr2 = data.get("arr2")
        arr3 = data.get("arr3")
    except Exception as err:
        string = "请使用JSON传输数据"
        return render(request, "xy.html", context={"result": string})
    result = solve_linear_equation(arr1, arr2, arr3)
    string = "[x,y]={}".format(result)
    return render(request, "xy.html", context={"result": string})


@require_http_methods(["POST", "GET"])
def matrix(request):
    try:
        data = json.loads(request.body.decode())
        matrix1 = data.get("matrix1")
        matrix2 = data.get("matrix2")
    except Exception as err:
        string = "请使用JSON传数据"
        return render(request, "matrix.html", context={"result": string})
    result = solve_matrix_dot(matrix1, matrix2)
    string = "result_matrix={}".format(result)
    return render(request, "matrix.html", context={"result": string})
