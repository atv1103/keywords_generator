list1 = input().split(',')
list2 = input().split(',')
list3 = input().split(',')
list4 = []
num = 0
for i in range(len(list1)):
    for j in range(len(list2)):
        for k in range(len(list3)):
            num += 1
            list4.append(list1[i])
            list4.append(list2[j])
            list4.append(list3[k])
            minus_words = [index for index in list4 if index.startswith('-')]
            # print('minus words', minus_words)
            if len(minus_words) != 0:
                for item in minus_words:
                    delete_element = list4.index(item)
                    list4.append(item)
                    del list4[delete_element]
                for x in list4:
                    if x in minus_words:
                        print(x, "Word not unic, please change")
            print(num, *list4)
            list4 = []